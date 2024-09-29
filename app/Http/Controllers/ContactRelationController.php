<?php

namespace App\Http\Controllers;

use App\Models\ContactRelation;
use App\Http\Requests\StoreContactRelationRequest;
use App\Http\Requests\UpdateContactRelationRequest;

class ContactRelationController extends Controller
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
    public function store(StoreContactRelationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactRelation $contactRelation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactRelation $contactRelation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRelationRequest $request, ContactRelation $contactRelation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactRelation $contactRelation)
    {
        //
    }
}
