<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Models\Logger;
use App\Http\Requests\StoreLearningRequest;
use App\Http\Requests\UpdateLearningRequest;
use App\Mail\LearningAssignedMail;
use App\Mail\LearningFinishedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class LearningController extends Controller
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
    public function store(StoreLearningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Learning $learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Learning $learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearningRequest $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learning $learning)
    {
        //
    }

    public function assignLearning($learningId, $assignedBy){
        $learning = Learning::findOrFail($learningId);
        $assignees = $learning->users;
        foreach($assignees as $assignee){
            Mail::to($assignee->email)->send(new LearningAssignedMail($learning, $assignedBy));
            Logger::log(Logger::ACTION_LEARNING_ASSIGNED_EMAIL, ['learning' => $learning], null, $assignee);
        }
    }

    public function finishLearning($learningId, $deptLeadEmail, $finishedBy, $totalMarks){
        $learning = Learning::findOrFail($learningId);
        Mail::to($deptLeadEmail)->send(new LearningFinishedMail($learning, $finishedBy, $totalMarks));
        Logger::log(Logger::ACTION_LEARNING_FINISHED_EMAIL, ['learning' => $learning], null, $deptLeadEmail);
    }
}
