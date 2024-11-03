<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logger;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $users = User::with('role', 'department')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max::255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'salary' => 'required|integer',
            'first_line' => 'required|string|max:255',
            'second_line' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'county' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'full_or_part' => 'required|string|max:50',
            'region' => 'required|string|max:50',
            'timezone' => 'required|string|max:50',
            'dark_mode' => 'boolean',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'office_based' => 'nullable|integer',
            'remote_based' => 'nullable|integer',
            'hybrid_based' => 'nullable|integer',
            'department_id' => 'nullable|exists:departments,id',
            'roles_id' => 'nullable|exists:roles,id',
            'seniority_id' => 'nullable|exists:seniorities,id', 
            'job_id' => 'nullable|exists:job,id',
            'holiday_entitlement_id' => 'nullable|exists:holiday_entitlements,id',
            'contact_id' => 'nullable|exists:user_contacts,id',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = new User($validatedData);
        $user->password = bcrypt($request->password);
        $user->created_by = Auth::id();

        // Profile Picture
        if($request->hasFile('profile_picture')){
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $profilePicturePath;
        }

        // CV
        if($request->hasFile('cv')){
            $cvPath = $request->file('cv')->store('cvs');
            $user->cv_path = $cvPath;
        }

        // Cover Letter
        if($request->hasFile('cover_letter')){
            $coverLetterPath = $request->file('cover_letter')->store('cover_letters');
            $user->cover_letter = $coverLetterPath;
        }

        $id = $user->id;
        Logger::log(Logger::ACTION_CREATE_USER, ['user' => $user], null, $id);
        $user->save();

        Mail::to($user->email)->send(new WelcomeNewUserMail($user, $request->password));
        Logger::log(Logger::ACTION_WELCOME_EMAIL_SENT, ['user' => $user], null, $id);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
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
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'salary' => 'required|integer',
            'first_line' => 'required|string|max:255',
            'second_line' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'county' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'full_or_part' => 'required|string|max:50',
            'region' => 'required|string|max:50',
            'timezone' => 'required|string|max:50',
            'dark_mode' => 'boolean',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'office_based' => 'nullable|integer',
            'remote_based' => 'nullable|integer',
            'hybrid_based' => 'nullable|integer',
            'department_id' => 'nullable|exists:departments,id',
            'roles_id' => 'nullable|exists:roles,id',
            'seniority_id' => 'nullable|exists:seniorities,id',
            'job_id' => 'nullable|exists:job,id',
            'holiday_entitlement_id' => 'nullable|exists:holiday_entitlements,id',
            'contact_id' => 'nullable|exists:user_contacts,id',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update user with validated data
        $user->fill($validatedData);

        // If password is provided, hash and update
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->updated_by = Auth::id();

        // Profile Picture
        if($request->hasFile('profile_picture')){
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $profilePicturePath;
        }

        // CV
        if($request->hasFile('cv')){
            $cvPath = $request->file('cv')->store('cvs');
            $user->cv_path = $cvPath;
        }

        // Cover Letter
        if($request->hasFile('cover_letter')){
            $coverLetterPath = $request->file('cover_letter')->store('cover_letters');
            $user->cover_letter = $coverLetterPath;
        }

        $user->save();
        $id = $user->id;
        Logger::log(Logger::ACTION_UPDATE_USER, ['user' => $user], null, $id);
        return redirect()->back()->with('success', 'User updated successfully!');
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
        return redirect()->route('users.index')->with('success', 'Users deleted successfully');
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
    
        return response()->json(['message' => 'Dark mode preference saved!']);
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

        return redirect()->back()->with('success', 'Profile Picture uploaded successfully');
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

        return redirect()->back()->with('success', 'CV uploaded successfully');
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

        return redirect()->back()->with('success', 'Cover Letter uploaded successfully');
    }
}
