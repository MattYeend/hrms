<?php

namespace App\Http\Controllers;

use App\Models\LeaveStatus;
use App\Models\Logger;
use App\Http\Requests\StoreLeaveStatusRequest;
use App\Http\Requests\UpdateLeaveStatusRequest;

class LeaveStatusController extends Controller
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
    public function store(StoreLeaveStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveStatus $leaveStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveStatus $leaveStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveStatusRequest $request, LeaveStatus $leaveStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveStatus $leaveStatus)
    {
        //
    }
}
