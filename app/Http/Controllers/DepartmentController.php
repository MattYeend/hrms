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
            $user = auth()->user();
            if (!$user->isSuperAdmin() && !$user->isAdmin() && !$user->cSuite()) {
                abort(403, __('departments.unauthorized_action'));
            }

            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Department::class);

        $departments = Department::with(['company', 'departmentLead'])->paginate(10);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Department::class);

        $company = Company::all();
        $departmentLead = User::all();

        return view('departments.create', compact('company', 'departmentLead'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $this->authorize('create', Department::class);

        $data = $request->validated();
        $department = Department::create($data);
        Logger::log(Logger::ACTION_CREATE_DEPARTMENT, ['department' => $department]);
        return redirect()->route('departments.index')->with('success', __('departments.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $this->authorize('view', $department);

        $department->load(['company', 'departmentLead']);
        Logger::log(Logger::ACTION_SHOW_DEPARTMENT, ['department' => $department]);
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $this->authorize('update', $department);
        $department->load(['company', 'departmentLead']);
        $company = Company::all();
        $departmentLead = User::all();
        return view('departments.update', compact('department', 'company', 'departmentLead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $this->authorize('update', $department);

        $data = $request->validated();
        $department->update($data);
        Logger::log(Logger::ACTION_UPDATE_DEPARTMENT, ['department' => $department]);
        return redirect()->route('departments.index')->with('success', __('departments.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $this->authorize('delete', $department);
        Logger::log(Logger::ACTION_DELETE_DEPARTMENT, ['department' => $department]);
        $department->delete();

        return redirect()->route('departments.index')->with('success', __('departments.deleted_success'));
    }
}
