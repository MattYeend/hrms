<?php

namespace App\Http\Controllers;

use App\Models\Tiles;
use App\Models\Logger;
use App\Http\Requests\StoreTilesRequest;
use App\Http\Requests\UpdateTilesRequest;

class TilesController extends Controller
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
    public function store(StoreTilesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiles $Tiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiles $Tiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTilesRequest $request, Tiles $Tiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiles $Tiles)
    {
        //
    }
}
