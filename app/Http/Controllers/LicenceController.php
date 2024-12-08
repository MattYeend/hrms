<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Models\Logger;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;
use Illuminate\Support\Facades\Auth;

class LicenceController extends Controller
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
        $this->authorize('viewAny', Licence::class);

        $licences = Licence::paginate(10);
        return view('licence.index', compact('licences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Licence::class);

        return view('licence.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLicenceRequest $request)
    {
        $this->authorize('create', Licence::class);

        $data = $request->validated();
        $licence = Licence::create($data);
        Logger::log(Logger::ACTION_CREATE_LICENCE, ['licence' => $licence]);
        return redirect()->route('licence.index')->with('success', 'Licence created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Licence $licence)
    {
        $this->authorize('view', $licence);

        $licence->load([ 'createdBy', 'updatedBy']);
        Logger::log(Logger::ACTION_SHOW_LICENCE, ['licence' => $licence]);
        return view('licence.show', compact('licence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licence $licence)
    {
        $this->authorize('update', $licence);
        $licence->get();
        return view('licence.update', compact('licence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenceRequest $request, Licence $licence)
    {
        $this->authorize('update', $licence);

        $data = $request->validated();
        $licence->update($data);
        Logger::log(Logger::ACTION_UPDATE_LICENCE, ['licence' => $licence]);
        return redirect()->route('licence.index')->with('success', 'Licence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licence $licence)
    {
        $this->authorize('delete', $licence);
        Logger::log(Logger::ACTION_DELETE_LICENCE, ['licence' => $licence]);
        $licence->delete();

        return redirect()->route('licence.index')->with('success', 'Licence deleted successfully.');
    }
}
