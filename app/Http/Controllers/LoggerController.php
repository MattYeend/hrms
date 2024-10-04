<?php

namespace App\Http\Controllers;

use App\Models\Logger;
use App\Http\Requests\StoreLoggerRequest;
use App\Http\Requests\UpdateLoggerRequest;

class LoggerController extends Controller
{
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
    public function store(StoreLoggerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Logger $logger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logger $logger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoggerRequest $request, Logger $logger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logger $logger)
    {
        //
    }
}
