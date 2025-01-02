<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\NoteType;
use App\Models\User;
use App\Models\Logger;
use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
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
        $notes = Notes::with(['noteType', 'createdBy'])
            ->when(auth()->user()->lineManagerOrDeptLead(), function($query) {
                $query->where('created_by', auth()->id());
            })
            ->paginate(10);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $noteTypes = NoteType::all();
        $users = User::all();
        $selectedUser = null;
        return view('notes.create', compact('noteTypes', 'users', 'selectedUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotesRequest $request)
    {
        Notes::create($request->validated() + ['created_by' => auth()->id()]);
        $note->users()->attach(auth()->id());
        Logger::log(Logger::ACTION_CREATE_NOTE, ['notes' => $notes]);
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $notes)
    {
        $this->authorize('view', $note);
        Logger::log(Logger::ACTION_SHOW_NOTE, ['notes' => $notes]);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $notes)
    {
        $this->authorize('update', $notes);
        $noteTypes = NoteType::all();
        $users = User::all();
        $selectedUser = $note->users->first()->id ?? null;
        return view('notes.edit', compact('note', 'noteTypes', 'users', 'selectedUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotesRequest $request, Notes $notes)
    {
        $this->authorize('update', $notes);
        $note->update($request->validated());
        Logger::log(Logger::ACTION_UPDATE_NOTE, ['note' => $notes]);
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $notes)
    {
        $this->authorize('delete', $note);
        Logger::log(Logger::ACTION_DELETE_NOTE, ['note' => $notes]);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
