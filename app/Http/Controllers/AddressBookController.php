<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use App\Http\Requests\StoreAddressBookRequest;
use App\Http\Requests\UpdateAddressBookRequest;

class AddressBookController extends Controller
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
    public function store(StoreAddressBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressBook $AddressBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddressBook $AddressBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressBookRequest $request, AddressBook $AddressBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressBook $AddressBook)
    {
        //
    }
}
