<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Logger;
use App\Models\Company;
use App\Models\User;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'Super Admin') {
                abort(403, 'Unauthorized action.');
            }
            return $next($request);
        });
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
    public function store(StoreDepartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $Department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $Department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $Department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $Department)
    {
        //
    }
}
