<?php

namespace App\Http\Controllers;

use App\Models\UserContact;
use App\Models\Logger;
use App\Http\Requests\StoreUserContactRequest;
use App\Http\Requests\UpdateUserContactRequest;

class UserContactController extends Controller
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
    public function store(StoreUserContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserContact $userContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserContact $userContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserContactRequest $request, UserContact $userContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserContact $userContact)
    {
        //
    }
}
