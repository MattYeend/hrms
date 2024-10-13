<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logger;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illumniate\Support\Facades\Storage;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

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

        return view('users.profile', compact('user', 'currencySymbol', 'canViewSensitiveDocs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

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
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function getDarkModePreference()
    {
        $user = Auth::user();
        return response()->json(['dark_mode' => $user->dark_mode == 1]);
    }

    public function toggleDarkMode(Request $request)
    {
        $user = Auth::user();
        $user->dark_mode = $request->input('dark_mode') ? 1 : 0;
        $user->save();

        return response()->json(['message' => 'Dark mode preference saved!']);
    }

    public function uploadProfilePicture(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('profile_picture')){
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $profilePicturePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile Picture uploaded successfully');
    }

    public function uploadCv(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if($request->hasFile('cv')){
            $cvPath = $request->file('cv')->store('cvs');
            $user->cv = $cvPath;
            $user->save();
        }

        return redirect()->back()->with('success', 'CV uploaded successfully');
    }

    public function uploadCoverLetter(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if($request->hasFile('cover_letter')){
            $coverLetterPath = $request->file('cover_letter')->store('cover_letters');
            $user->cover_letter = $coverLetterPath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Cover Letter uploaded successfully');
    }
}
