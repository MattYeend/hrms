<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Models\Logger;
use App\Http\Requests\StoreLearningRequest;
use App\Http\Requests\UpdateLearningRequest;

class LearningController extends Controller
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
    public function store(StoreLearningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Learning $learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Learning $learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearningRequest $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learning $learning)
    {
        //
    }
}
