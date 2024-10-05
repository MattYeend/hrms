<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Models\Logger;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;

class LicenceController extends Controller
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
    public function store(StoreLicenceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Licence $Licence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licence $Licence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenceRequest $request, Licence $Licence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licence $Licence)
    {
        //
    }
}
