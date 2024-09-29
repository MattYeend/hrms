<?php

namespace App\Http\Controllers;

use App\Models\HolidayEntitlement;
use App\Http\Requests\StoreHolidayEntitlementRequest;
use App\Http\Requests\UpdateHolidayEntitlementRequest;

class HolidayEntitlementController extends Controller
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
    public function store(StoreHolidayEntitlementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayEntitlement $holidayEntitlement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HolidayEntitlement $holidayEntitlement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHolidayEntitlementRequest $request, HolidayEntitlement $holidayEntitlement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HolidayEntitlement $holidayEntitlement)
    {
        //
    }
}
