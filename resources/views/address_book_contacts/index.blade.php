@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __('address_book_contacts.address_contact')}}</span>
            @can('create', App\Models\addressContact::class)
                <a href="{{ route('addressContact.create') }}" class="btn btn-success">{{ __('address_book_contacts.create') }}</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('address_book_contacts.name') }}</th>
                        <th>{{ __('address_book_contacts.email') }}</th>
                        <th>{{ __('address_book_contacts.phone') }}</th>
                        <th>{{ __('address_book_contacts.position') }}</th>
                        <th>{{ __('address_book_contacts.main_contact') }}</th>
                        <th>{{ __('address_book_contacts.secondary_contact') }}</th>
                        <th>{{ __('address_book_contacts.address') }}</th>
                        <th>{{ __('address_book_contacts.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addressContacts as $addressContact)
                        <tr>
                            <td>{{ $addressContact->is_live ? $addressContact->name : __('address_book_contacts.is_test') . ' ' . $addressContact->name }}</td>
                            <td>{{ $addressContact->name }}</td>
                            <td>{{ $addressContact->email }}</td>
                            <td>{{ $addressContact->phone ?? __('address_book_contacts.not_provided') }}</td>
                            <td>{{ $addressContact->position }}</td>
                            <td>{{ $addressContact->main_contact ?? __('address_book_contacts.not_provided') }}</td>
                            <td>{{ $addressContact->secondary_contact ?? __('address_book_contacts.not_provided') }}</td>
                            <td>
                                {{ $addressContact->addressBook->first_line }}<br />
                                {{ $addressContact->addressBook->country }}</br />
                                {{ $addressContact->addressBook->post_code }}
                            </td>
                            <td>
                                <a href="{{ route('addressContact.show', $addressContact->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('address_book_contacts.view') }}</a>
                                @can('update', $addressContact)
                                    <a href="{{ route('addressContact.edit', $addressContact->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('address_book_contacts.edit') }}</a>
                                @endcan
                                @can('delete', $addressContact)
                                    <form action="{{ route('addressContact.delete', $addressContact->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('address_book_contacts.delete') }}</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $addressContacts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
