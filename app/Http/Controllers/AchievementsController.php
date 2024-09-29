<?php

namespace App\Http\Controllers;

use App\Models\Achievements;
use App\Http\Requests\StoreAchievementsRequest;
use App\Http\Requests\UpdateAchievementsRequest;

class AchievementsController extends Controller
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
    public function store(StoreAchievementsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievements $achievements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievements $achievements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAchievementsRequest $request, Achievements $achievements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievements $achievements)
    {
        //
    }
}
