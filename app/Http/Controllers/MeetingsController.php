<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use App\Http\Requests\StoreMeetingsRequest;
use App\Http\Requests\UpdateMeetingsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MeetingsController extends Controller
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
    public function store(StoreMeetingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Meetings $meetings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meetings $meetings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingsRequest $request, Meetings $meetings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meetings $meetings)
    {
        //
    }

    public function getMeetings()
    {
        $meetings = Meeting::with('meetingType')->get();

        return response()->json($meetings);
    }
}
