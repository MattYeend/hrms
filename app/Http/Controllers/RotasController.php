<?php

namespace App\Http\Controllers;

use App\Models\Rotas;
use App\Models\Logger;
use App\Models\User;;
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
        $rotas = Rotas::with('user', 'department')->paginate(10);;
        return view('rotas.index', compact('rotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Rotas::class);

        $users = User::all();
        $departments = Department::all();
        return view('rotas.create', compact('users', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRotasRequest $request)
    {
        $rota = Rotas::create($request->validated());
        Logger::log(Logger::ACTION_CREATE_ROTA, ['rota' => $rota]);
        return redirect()->route('rotas.index')->with('success', 'Rota created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rota = Rotas::find($id);

        if(!$rota){
            return response()->json(['message' => 'Rota not found'], 404);
        }

        Logger::log(Logger::ACTION_SHOW_ROTA, ['rota' => $rota]);
        return view('rotas.show', compact('rota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rotas $rotas)
    {
        $this->authorize('update', $rotas);

        $users = User::all();
        $departments = Department::all();
        return view('rotas.update', compact('rotas', 'users', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotasRequest $request, Rotas $rotas)
    {
        $rotas->update($request->validated());
        Logger::log(Logger::ACTION_UPDATE_ROTA, ['rota' => $rotas]);
        return redirect()->route('rotas.index')->with('success', 'Rota updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rotas $rotas)
    {
        Logger::log(Logger::ACTION_DELETE_ROTA, ['rota' => $rotas]);
        $rotas->delete();
        return redirect()->route('rotas.index')->with('success', 'Rota deleted successfully.');
    }

    public function getRotas()
    {
        $rotas = Rotas::with('user', 'department')->get();

        return response()->json($rotas);
    }
}
