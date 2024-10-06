<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Logger;
use App\Models\User;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    public function __construct()
    {
        // Add Middleware to protect routes
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $leaves = Leave::where('created_by', $user->id)->get();
        $totalLeavesTaken = $leaves->sum('days');
        return view('leave.index', [
            'holiday_entitlement' => $user->holidayEntitlement->total,
            'total_leaves_taken' => $totalLeavesTaken,
            'leaves' => $leaves
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('leave.create', compact('leaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequest $request)
    {
        $leave = Leave::create($request->validated() + ['created_by' => Auth::user()->id]);
        $this->notifyDeptLead($leave);
        return redirect()->route('calendar')->with('success', 'Leave created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        $this->authorize('update', $leave);
        $leaveTypes = LeaveType::all();
        return view('leave.edit', compact('leave', 'leaveTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        $this->authorize('update', $leave);
        $leave->update($request->validated() + ['updated_by' => Auth::user()->id]);
        $this->notifyDeptLead($leave);
        return redirect()->route('calendar')->with('success', 'Leave updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }

    public function getHolidays()
    {
        $publicHolidaysJson = Storage::get('holidays.json');
        $publicHolidays = json_decode($publicHolidaysJson, true);
        return response()->json($publicHolidays['countries']);
    }

    private function notifyDeptLead(Leave $leave)
    {
        $deptLead = $leave->createdBy->department->dept_lead_id;
        $lead = User::find($deptLead);
        if($lead){
            Mail::to($lead->email)->send(new \App\Mail\LeaveNotificationMail($leave));
        }
    }
}
