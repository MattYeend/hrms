@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __(address_book.address_book)}}</span>
            @can('create', App\Models\AddressBook::class)
                <a href="{{ route('addressBook.create') }}" class="btn btn-success">{{ __('address_book.create') }}</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('address_book.first_line') }}</th>
                        <th>{{ __('address_book.second_line') }}</th>
                        <th>{{ __('address_book.town') }}</th>
                        <th>{{ __('address_book.city') }}</th>
                        <th>{{ __('address_book.county') }}</th>
                        <th>{{ __('address_book.country') }}</th>
                        <th>{{ __('address_book.post_code') }}</th>
                        <th>{{ __('address_book.head_office') }}</th>
                        <th>{{ __('address_book.address_contact') }}</th>
                        <th>{{ __('address_book.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addressBook as $address)
                        <tr>
                            <td>{{ $address->first_line }}</td>
                            <td>{{ $address->second_line ?? __(address_book.not_provided) }}</td>
                            <td>{{ $address->town ?? __(address_book.not_provided) }}</td>
                            <td>{{ $address->city ?? __(address_book.not_provided) }}</td>
                            <td>{{ $address->county ?? __(address_book.not_provided) }}</td>
                            <td>{{ $address->country }}</td>
                            <td>{{ $address->post_code }}</td>
                            <td>{{ $address->head_office }}</td>
                            <td>{{ $address->addressContact->name }}</td>
                            <td>
                                <a href="{{ route('addressBook.show', $address->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('address_book.view') }}</a>
                                @can('update', $address)
                                    <a href="{{ route('addressBook.edit', $address->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('address_book.edit') }}</a>
                                @endcan
                                @can('delete', $address)
                                    @if (auth()->user()->id !== $address->id)
                                        <form action="{{ route('addressBook.delete', $address->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('address_book.delete') }}</button>
                                        </form>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $addressBook->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
