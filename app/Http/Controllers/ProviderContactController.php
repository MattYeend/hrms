<?php

namespace App\Http\Controllers;

use App\Models\ProviderContact;
use App\Models\Logger;
use App\Http\Requests\StoreProviderContactRequest;
use App\Http\Requests\UpdateProviderContactRequest;

class ProviderContactController extends Controller
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
    public function store(StoreProviderContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProviderContact $providerContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProviderContact $providerContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProviderContactRequest $request, ProviderContact $providerContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProviderContact $providerContact)
    {
        //
    }
}
