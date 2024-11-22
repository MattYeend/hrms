<?php

namespace App\Http\Controllers;

use App\Models\CompanyContact;
use App\Models\Logger;
use App\Http\Requests\StoreCompanyContactRequest;
use App\Http\Requests\UpdateCompanyContactRequest;

class CompanyContactController extends Controller
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
    public function store(StoreCompanyContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyContact $CompanyContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyContact $CompanyContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyContactRequest $request, CompanyContact $CompanyContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyContact $CompanyContact)
    {
        //
    }
}
