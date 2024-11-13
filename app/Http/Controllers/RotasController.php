<?php

namespace App\Http\Controllers;

use App\Models\Rotas;
use App\Models\Logger;
use App\Modes\User;
use App\Models\Department;
use App\Http\Requests\StoreRotasRequest;
use App\Http\Requests\UpdateRotasRequest;
use Illuminate\Http\Request;

class RotasController extends Controller
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
        $rotas = Rota::with('user', 'department')->get();
        return view('rotas.index', compact('rotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $departments = Department::all();
        return view('rotas.create', compact('users', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRotasRequest $request)
    {
        Rota::create($request->validated());
        return redirect()->route('rotas.index')->with('success', 'Rota created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rotas $rotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rotas $rotas)
    {
        $users = User::all();
        $departments = Department::all();
        return view('rotas.edit', compact('rotas', 'users', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotasRequest $request, Rotas $rotas)
    {
        $rotas->update($request->validated());
        return redirect()->route('rotas.index')->with('success', 'Rota updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rotas $rotas)
    {
        $rotas->delete();
        return redirect()->route('rotas.index')->with('success', 'Rota deleted successfully.');
    }
}
