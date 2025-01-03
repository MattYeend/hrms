<?php

namespace App\Http\Controllers;

use App\Models\Interests;
use App\Models\Logger;
use App\Http\Requests\StoreInterestsRequest;
use App\Http\Requests\UpdateInterestsRequest;

class InterestsController extends Controller
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
    public function store(StoreInterestsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Interests $interests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interests $interests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInterestsRequest $request, Interests $interests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interests $interests)
    {
        //
    }
}
