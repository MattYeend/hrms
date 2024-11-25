<?php

namespace App\Http\Controllers;

use App\Models\CompanyContact;
use App\Models\Logger;
use App\Models\Company;
use App\Http\Requests\StoreCompanyContactRequest;
use App\Http\Requests\UpdateCompanyContactRequest;
use Illuminate\Support\Facades\Auth;

class CompanyContactController extends Controller
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
    public function store(StoreCompanyContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyContact $companyContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyContact $companyContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyContactRequest $request, CompanyContact $companyContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyContact $companyContact)
    {
        //
    }
}
