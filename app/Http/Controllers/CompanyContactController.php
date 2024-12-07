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
            if (Auth::user()->role->name !== 'Super Admin') {
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
        $this->authorize('viewAny', CompanyContact::class);

        $contacts = CompanyContact::with('company')->paginate(10);
        
        return view('company_contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', CompanyContact::class);

        return view('company_contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyContactRequest $request)
    {
        $this->authorize('create', CompanyContact::class);

        $validated = $request->validated();
        $contact = CompanyContact::create($validated);
        Logger::log(Logger::ACTION_CREATE_COMPANY_CONTACTS, ['companyContact' => $contact]);
        return redirect()->route('company_contacts.index')
            ->with('success', 'Company contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyContact $companyContact)
    {
        $this->authorize('view', $companyContact);
        
        $companyContact->load('company');
        Logger::log(Logger::ACTION_SHOW_COMPANY_CONTACTS, ['companyContact' => $companyContact]);
        return view('company_contacts.show', compact('companyContact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyContact $companyContact)
    {
        $this->authorize('update', $companyContact);

        return view('company_contacts.update', compact('companyContact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyContactRequest $request, CompanyContact $companyContact)
    {
        $this->authorize('update', $companyContact);

        $validated = $request->validated();
        $companyContact->update($validated);
        Logger::log(Logger::ACTION_UPDATE_COMPANY_CONTACTS, ['companyContact' => $companyContact]);
        return redirect()->route('company_contacts.index')
            ->with('success', 'Company contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyContact $companyContact)
    {
        $this->authorize('delete', $companyContact);
        Logger::log(Logger::ACTION_DELETE_COMPANY_CONTACTS, ['companyContact' => $companyContact]);
        $companyContact->delete();

        return redirect()->route('company_contacts.index')
            ->with('success', 'Company contact deleted successfully.');
    }
}
