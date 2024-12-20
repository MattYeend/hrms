<?php

namespace App\Http\Controllers;

use App\Models\EmailLogs;
use App\Http\Requests\StoreEmailLogsRequest;
use App\Http\Requests\UpdateEmailLogsRequest;

class EmailLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', EmailLogs::class);
        $emailLogs = EmailLogs::paginate(10);
        return view('email_logs.index', compact('emailLogs'));
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
    public function store(StoreEmailLogsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailLogs $emailLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailLogs $emailLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmailLogsRequest $request, EmailLogs $emailLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailLogs $emailLogs)
    {
        //
    }
}
