<?php

namespace App\Http\Controllers;

use App\Models\AddressContact;
use App\Models\Logger;
use App\Http\Requests\StoreAddressContactRequest;
use App\Http\Requests\UpdateAddressContactRequest;

class AddressContactController extends Controller
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
    public function store(StoreAddressContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressContact $addressContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddressContact $addressContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressContactRequest $request, AddressContact $addressContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressContact $addressContact)
    {
        //
    }
}
