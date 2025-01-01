<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Logger;
use App\Models\SalaryRange;
use App\Models\Users;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
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
        $this->authorize('viewAny', Job::class);

        $jobs = Job::with(['salaryRange', 'users', 'createdBy', 'updatedBy', 'deletedBy'])->paginate(10);
        
        return view('job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);

        $salaryRange = SalaryRange::all();
        $users = Users::all();

        return view('job.create', compact('salaryRange', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $this->authorize('create', Job::class);

        $data = $request->validated();
        $job = Job::create($data);
        Logger::log(Logger::ACTION_CREATE_JOB, ['job' => $job]);
        return redirect()->route('job.index')->with('success', __('job.deleted_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $this->authorize('view', $job);

        $job->load(['salaryRange', 'users', 'createdBy', 'updatedBy', 'deletedBy']);
        Logger::log(Logger::ACTION_SHOW_JOB, ['job' => $job]);

        $currencySymbols = [
            'US' => '$',
            'EU' => '€',
            'UK' => '£',
            'IN' => '₹',
        ];
        $userRegion = auth()->user()->region;

        $currencySymbol = $currencySymbols[$userRegion] ?? '£';
        return view('job.show', compact('job', 'currencySymbol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        $job->load(['salaryRange', 'users']);
        $salaryRange = SalaryRange::all();
        return view('job.update', compact('job', 'salaryRange'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $this->authorize('update', $job);

        $data = $request->validated();
        $job->update($data);
        Logger::log(Logger::ACTION_UPDATE_JOB, ['job' => $job]);
        return redirect()->route('job.index')->with('success', __('job.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        Logger::log(Logger::ACTION_DELETE_JOB, ['job' => $job]);
        $job->delete();

        return redirect()->route('job.index')->with('success', __('job.deleted_success'));
    }
}
