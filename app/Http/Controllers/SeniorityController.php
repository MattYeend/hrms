<?php

namespace App\Http\Controllers;

use App\Models\Seniority;
use App\Http\Requests\StoreSeniorityRequest;
use App\Http\Requests\UpdateSeniorityRequest;

class SeniorityController extends Controller
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
    public function store(StoreSeniorityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Seniority $seniority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seniority $seniority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeniorityRequest $request, Seniority $seniority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seniority $seniority)
    {
        //
    }
}
