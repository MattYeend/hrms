<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Logger;
use App\Models\Licence;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role->name !== 'Super Admin') {
                abort(403, __('contacts.unauthorized_action'));
            }
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Contract::class);

        $contracts = Contract::with(['licence'])->paginate(10);
        return view('company_contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Contract::class);

        $licence = Licence::all();

        return view('company_contracts.create', compact('licence'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request)
    {
        $this->authorize('create', Contract::class);

        $data = $request->validated();
        $contract = Contract::create($data);
        Logger::log(Logger::ACTION_CREATE_CONTRACT, ['contract' => $contract]);
        return redirect()->route('contract.index')->with('success', __('contacts.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        $this->authorize('view', $contract);

        $contract->load(['licence']);
        Logger::log(Logger::ACTION_SHOW_CONTRACT, ['contract' => $contract]);
        return view('company_contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $this->authorize('update', $contract);
        $contract->load(['licence']);
        $licence = Licence::all();
        return view('company_contracts.update', compact('contract', 'licence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $this->authorize('update', $contract);

        $data = $request->validated();
        $contract->update($data);
        Logger::log(Logger::ACTION_UPDATE_CONTRACT, ['contract' => $contract]);
        return redirect()->route('contract.index')->with('success', __('contacts.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $this->authorize('delete', $contract);
        Logger::log(Logger::ACTION_DELETE_CONTRACT, ['contract' => $contract]);
        $contract->delete();

        return redirect()->route('contract.index')->with('success', __('contacts.deleted_success'));
    }
}
