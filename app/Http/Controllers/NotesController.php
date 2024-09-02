<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;

class NotesController extends Controller
{
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
    public function store(StoreNotesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $Notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $Notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotesRequest $request, Notes $Notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $Notes)
    {
        //
    }
}
