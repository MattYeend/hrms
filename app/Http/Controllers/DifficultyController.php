<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use App\Models\Logger;
use App\Http\Requests\StoreDifficultyRequest;
use App\Http\Requests\UpdateDifficultyRequest;

class DifficultyController extends Controller
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
    public function store(StoreDifficultyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Difficulty $difficulty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Difficulty $difficulty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDifficultyRequest $request, Difficulty $difficulty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Difficulty $difficulty)
    {
        //
    }
}
