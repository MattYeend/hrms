<?php

namespace App\Http\Controllers;

use App\Models\SalaryRange;
use App\Http\Requests\StoreSalaryRangeRequest;
use App\Http\Requests\UpdateSalaryRangeRequest;

class SalaryRangeController extends Controller
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
    public function store(StoreSalaryRangeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SalaryRange $SalaryRange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalaryRange $SalaryRange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryRangeRequest $request, SalaryRange $SalaryRange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalaryRange $SalaryRange)
    {
        //
    }
}
