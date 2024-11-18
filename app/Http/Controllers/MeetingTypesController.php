<?php

namespace App\Http\Controllers;

use App\Models\MeetingTypes;
use App\Models\Logger;
use App\Http\Requests\StoreMeetingTypesRequest;
use App\Http\Requests\UpdateMeetingTypesRequest;

class MeetingTypesController extends Controller
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
    public function store(StoreMeetingTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingTypes $meetingTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingTypes $meetingTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingTypesRequest $request, MeetingTypes $meetingTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingTypes $meetingTypes)
    {
        //
    }
}
