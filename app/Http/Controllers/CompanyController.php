<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Logger;
use App\Models\Contract;
use App\Models\CompanyContract;
use App\Models\User;
use App\Models\AddressBook;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
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
        $this->authorize('viewAny', Company::class);

        $companies = Company::with(['contract', 'companyContact', 'companyRelationshipManager', 'addressBook'])->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Company::class);

        $contracts = Contract::all();
        $contacts = CompanyContact::all();
        $relationshipManagers = User::all();
        $addresses = AddressBook::all();

        return view('companies.create', compact('contracts', 'contacts', 'relationshipManagers', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $this->authorize('create', Company::class);

        $data = $request->validated();
        Company::create($data);

        return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $this->authorize('view', $company);

        $company->load(['contract', 'companyContact', 'companyRelationshipManager', 'addressBook', 'createdBy', 'updatedBy']);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $this->authorize('update', $company);
        $company->load(['contract', 'companyContact', 'companyRelationshipManager', 'addressBook']);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->authorize('update', $company);

        $data = $request->validated();
        $company->update($data);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->authorize('delete', $company);

        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
