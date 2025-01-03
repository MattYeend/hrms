<?php

namespace App\Http\Controllers;

use App\Models\AddressContact;
use App\Models\Logger;
use App\Http\Requests\StoreAddressContactRequest;
use App\Http\Requests\UpdateAddressContactRequest;
use Illuminate\Support\Facades\Auth;

class AddressContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role->name !== 'Super Admin') {
                abort(403, __('address_book_contacts.unauthorized_action'));
            }
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', AddressContact::class);

        $addressContacts = AddressContact::with('addressBook')->paginate(10);
        
        return view('address_book_contacts.index', compact('addressContacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', AddressContact::class);
        return view('address_book_contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressContactRequest $request)
    {
        $this->authorize('create', AddressContact::class);

        $addressContact = AddressContact::create($request->validated() + ['is_live' => $request->input('is_live', true)]);
        Logger::log(Logger::ACTION_CREATE_ADDRESS_BOOK_CONTACT, ['addressContact' => $addressContact]);
        return redirect()->route('addressContact.index')->with('success', __('address_book_contacts.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressContact $addressContact)
    {
        $this->authorize('view', $addressContact);
        Logger::log(Logger::ACTION_SHOW_ADDRESS_BOOK_CONTACT, ['addressContact' => $addressContact]);
        return view('address_book_contacts.show', compact('addressContact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddressContact $addressContact)
    {
        $this->authorize('update', $addressContact);
        return view('address_book_contacts.update', compact('addressContact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressContactRequest $request, AddressContact $addressContact)
    {
        $this->authorize('update', $addressContact);

        Logger::log(Logger::ACTION_UPDATE_ADDRESS_BOOK_CONTACT, ['addressContact' => $addressContact]);
        $addressContact->update($request->validated() + ['is_live' => $request->input('is_live', true)]);

        return redirect()->route('addressContact.index')->with('success', __('address_book_contacts.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressContact $addressContact)
    {
        $this->authorize('delete', $addressContact);
        Logger::log(Logger::ACTION_DELETE_ADDRESS_BOOK_CONTACT, ['addressContact' => $addressContact]);
        $addressContact->delete();

        return redirect()->route('addressContact.index')->with('success', __('address_book_contacts.deleted_success'));
    }
}
