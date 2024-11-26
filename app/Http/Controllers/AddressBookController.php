<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use App\Models\User;
use App\Models\AddressContact;
use App\Models\Logger;
use App\Http\Requests\StoreAddressBookRequest;
use App\Http\Requests\UpdateAddressBookRequest;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
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
        $this->authorize('viewAny', AddressBook::class);

        $addressBooks = AddressBook::all();

        return view('address_books.index', compact('addressBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', AddressBook::class);
        return view('address_books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressBookRequest $request)
    {
        $this->authorize('create', AddressBook::class);

        AddressBook::create($request->validated());

        return redirect()->route('address_books.index')->with('success', 'Address Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressBook $addressBook)
    {
        $this->authorize('view', $addressBook);

        return view('address_books.show', compact('addressBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddressBook $addressBook)
    {
        $this->authorize('update', $addressBook);
        return view('address_books.edit', compact('addressBook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressBookRequest $request, AddressBook $addressBook)
    {
        $this->authorize('update', $addressBook);

        $addressBook->update($request->validated());

        return redirect()->route('address_books.index')->with('success', 'Address Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressBook $addressBook)
    {
        $this->authorize('delete', $addressBook);
        
        $addressBook->delete();

        return redirect()->route('address_books.index')->with('success', 'Address Book deleted successfully.');
    }
}
