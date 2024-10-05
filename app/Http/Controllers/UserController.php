<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logger;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // Add Middleware to protect routes
        // E.G $this->middleware('auth');
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
        //
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

        return view('users.profile', compact('user', 'currencySymbol'));
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
        //
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
}
