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
        $company = $user->department->company;
        $workWeekends = $company->work_weekends;

        $leaves = Leave::where('created_by', $user->id)
            ->whereIn('status_id', [1, 2])
            ->get();

        $totalLeavesTaken = $leaves->sum(function ($leave) use ($workWeekends) {
            return $leave->calculateLeaveDays($leave->date_from, $leave->date_to, $workWeekends);
        });
        
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
        $leave = Leave::create($request->validated() + [
            'created_by' => Auth::user()->id,
            'leave_status_id' => 2
        ]);
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
        $leave->update($request->validated() + [
            'updated_by' => Auth::user()->id,
            'leave_status_id' => 2
        ]);
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

    public function approve()
    {
        $leave = Leave::findOrFail($leaveId);

        $leave->leave_status_id = 1; 
        $leave->save();

        // Send approval email
        Mail::to($leave->createdBy->email)->send(new \App\Mail\LeaveApprovedMail($leave));

        return redirect()->route('calendar')->with('success', 'Leave approved successfully.');
    }

    public function deny()
    {
        $leave = Leave::findOrFail($leaveId);

        $leave->leave_status_id = 3;
        $leave->save();

        Mail::to($leave->createdBy->email)->send(new \App\Mail\LeaveDeniedMail($leave));

        return redirect()->route('calendar')->with('success', 'Leave denied successfully.');
    }

    public function getLeaves()
    {
        $user = Auth::user();
        $leaves = Leave::with('leaveType')->where('created_by', $user->id)->get();
        return response()->json($leaves);
    }

    public function outstandingRequests()
    {
        $this->authorise('viewAny', Leave::class);
        
        $user = Auth::user();

        if($user->isSuperAdmin() || $user->isAdmin() || $user->cSuite){
            $outstandingLeaves = Leave::with('leaveType', 'createdBy')->where('status_id', 2)->get();
        }elseif($user->department && $user->department->dept_lead_id === $user->id){
            $outstandingLeaves = Leave::with('leaveType', 'createdBy')
                ->whereHas('createdBy', function($query) use($user){
                    $query->where('department_id', $user->department->id);
                })
                ->where('status_id', 2)
                ->get();
        }else{
            $outstandingLeaves = collect();
        }

        return view('leave.outstanding', compact('outstanding'));
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
