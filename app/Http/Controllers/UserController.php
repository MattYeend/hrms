<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logger;
use App\Models\Department;
use App\Models\Roles;
use App\Models\UserContact;
use App\Models\Seniority;
use App\Models\Job;
use App\Models\HolidayEntitlement;
use App\Mail\WelcomeNewUserMail;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use DateTimeZone;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Admins and super admins to view all
        $this->authorize('viewAny', User::class);

        $users = User::with('role', 'department')->get();

        $roleOrder = ['Super Admin', 'Admin', 'User'];

        $sortedUsers = $users->sortBy(function($user) use($roleOrder){
            $roleRank = array_search($user->role->name, $roleOrder);
            $roleRank = $roleRank === false ? count($roleOrder) : $roleRank;
            $deptRank = $user->department->name === 'C Suite' ? 0 : 1;
            return [$roleRank, $deptRank, $user->department->name];
        });

        $currentPage = request('page', 1);
        $perPage = 10;
        $paginatedUsers = new LengthAwarePaginator(
            $sortedUsers->forPage($currentPage, $perPage),
            $sortedUsers->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('users.index', ['users' => $paginatedUsers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $departments = Department::all();
        $roles = Roles::all();
        $userContacts = UserContact::all();
        $seniorities = Seniority::all();
        $jobs = Job::all();
        $holidayEntitlements = HolidayEntitlement::all();
        $timezones = DateTimeZone::listIdentifiers();
        $regions = json_decode(Storage::get('regions.json'), true);

        return view('users.create', compact('departments', 'roles', 'userContacts', 'seniorities', 'jobs', 'holidayEntitlements', 'timezones', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated() + [
            'created_by' => Auth::user()->id,
            'is_live' => $request->input('is_live', true),
        ];
        
        $user = new User($validatedData);
        $user->password = bcrypt($request->password);

        // Profile Picture
        if($request->hasFile('profile_picture')){
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        // CV
        if($request->hasFile('cv')){
            $cvFilename = $request->file('cv')->getClientOriginalName();
            $cvPath = $request->file('cv')->storeAs('cvs', $cvFilename, 'public');
            $user->cv_path = $cvPath;
        }

        // Cover Letter
        if($request->hasFile('cover_letter')){
            $coverLetterFilename = $request->file('cover_letter')->getClientOriginalName();
            $coverLetterPath = $request->file('cover_letter')->storeAs('cover_letters', $coverLetterFilename, 'public');
            $user->cover_letter = $coverLetterPath;
        }

        $id = $user->id;
        Logger::log(Logger::ACTION_CREATE_USER, ['user' => $user], null, $id);
        $user->save();

        Mail::to($user->email)->send(new WelcomeNewUserMail($user, $request->password));
        Logger::log(Logger::ACTION_WELCOME_EMAIL_SENT, ['user' => $user], null, $id);

        return redirect()->route('user.index')->with('success', __('users.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => __('users.not_found')], 404);
        }

        $currencySymbols = [
            'US' => '$',
            'EU' => '€',
            'UK' => '£',
            'IN' => '₹',
        ];
    
        $userRegion = $user->region;
        $currencySymbol = $currencySymbols[$userRegion] ?? '£';

        $canViewSensitiveDocs = Auth::user()->can('viewSensitiveDocs', $user);

        Logger::log(Logger::ACTION_SHOW_USER, ['user' => $user], null, $id);
        return view('users.profile', compact('user', 'currencySymbol', 'canViewSensitiveDocs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $departments = Department::all();
        $roles = Roles::all();
        $userContacts = UserContact::all();
        $seniorities = Seniority::all();
        $jobs = Job::all();
        $holidayEntitlements = HolidayEntitlement::all();
        $timezones = DateTimeZone::listIdentifiers();
        $regions = json_decode(Storage::get('regions.json'), true);

        return view('users.update', compact('user', 'departments', 'roles', 'userContacts', 'seniorities', 'jobs', 'holidayEntitlements', 'timezones', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validatedData = $request->validated() + [
            'updated_by' => Auth::user()->id,
            'is_live' => $request->input('is_live', true),
        ];

        // If password is provided, hash and update
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        } else {
            unset($validatedData['password']);
        }

        // Update user with validated data
        $user->fill($validatedData);

        // Profile Picture
        if($request->hasFile('profile_picture')){
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        // CV
        if($request->hasFile('cv')){
            $cvFilename = $request->file('cv')->getClientOriginalName();
            $cvPath = $request->file('cv')->storeAs('cvs', $cvFilename, 'public');
            $user->cv_path = $cvPath;
        }

        // Cover Letter
        if($request->hasFile('cover_letter')){
            $coverLetterFilename = $request->file('cover_letter')->getClientOriginalName();
            $coverLetterPath = $request->file('cover_letter')->storeAs('cover_letters', $coverLetterFilename, 'public');
            $user->cover_letter = $coverLetterPath;
        }

        $user->save();
        $id = $user->id;
        Logger::log(Logger::ACTION_UPDATE_USER, ['user' => $user], null, $id);
        return redirect()->route('user.index')->with('success', __('users.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        $id = $user->id;
        Logger::log(Logger::ACTION_DELETE_USER, ['user' => $user], null, $id);
        return redirect()->route('users.index')->with('success', __('users.deleted_success'));
    }

    public function getDarkModePreference()
    {
        $user = Auth::user();
        return response()->json(['dark_mode' => $user->dark_mode == 1]);
    }

    public function toggleDarkMode(Request $request)
    {
        $request->validate([
            'dark_mode' => 'required|boolean',
        ]);
    
        $user = Auth::user();
        $dark_mode = $request->input('dark_mode') ? 1 : 0;
        $user->dark_mode = $dark_mode;
        $user->save();
        
        Logger::log(Logger::ACTION_DARK_MODE_TOGGLE, ['dark_mode' => $dark_mode]);
    
        return response()->json(['message' => __('users.dark_mode')]);
    }

    public function uploadProfilePicture(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('profile_picture')){
            $id = $user->id;
            $isNewPictureUpload = !$user->profile_picture;

            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $profilePicturePath;
            $user->save();

            if($isNewPictureUpload){
                Logger::log(Logger::ACTION_PROFILE_PICTURE_UPLOAD, ['user' => $user], null, $id);
            }else{
                Logger::log(Logger::ACTION_PROFILE_PICTURE_CHANGE, ['user' => $user], null, $id);
            }
        }

        return redirect()->back()->with('success', __('users.picture_upload_success'));
    }

    public function uploadCv(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if($request->hasFile('cv')){
            $id = $user->id;
            $isNewCVUpload = !$user->cv;

            $cvPath = $request->file('cv')->store('cvs');
            $user->cv = $cvPath;
            $user->save();

            if($isNewCVUpload){
                Logger::log(Logger::ACTION_CV_UPLOAD, ['user' => $user], null, $id);
            }else{
                Logger::log(Logger::ACTION_CV_CHANGE, ['user' => $user], null, $id);
            }
        }

        return redirect()->back()->with('success', __('users.cv_upload_success'));
    }

    public function uploadCoverLetter(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if($request->hasFile('cover_letter')){
            $id = $user->id;
            $isNewCoverLetterUpload = !$user->cover_letter;

            $coverLetterPath = $request->file('cover_letter')->store('cover_letters');
            $user->cover_letter = $coverLetterPath;
            $user->save();

            if($isNewCVUpload){
                Logger::log(Logger::ACTION_COVER_LETTER_UPLOAD, ['user' => $user], null, $id);
            }else{
                Logger::log(Logger::ACTION_COVER_LETTER_CHANGE, ['user' => $user], null, $id);
            }
        }

        return redirect()->back()->with('success', __('users.cover_letter_upload_success'));
    }
}
