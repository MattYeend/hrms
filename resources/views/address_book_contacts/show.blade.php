@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $addressContact->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('address_book_contacts.name') }}: {{ $addressContact->is_live ? $addressContact->name : __('address_book_contacts.is_test') . ' ' . $addressContact->name }}</p>
                            <p>{{ __('address_book_contacts.email') }}: {{ $addressContact->email }}</p>
                            <p>{{ __('address_book_contacts.phone') }}: {{ $addressContact->phone ?? __('address_book_contacts.not_provided') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('address_book_contacts.position') }}: {{ $addressContact->position }}</p>
                            <p>{{ __('address_book_contacts.main_contact') }}: {{ $addressContact->main_contact ? __('address_book_contacts.yes') : __('address_book_contacts.no') }}</p>
                            <p>{{ __('address_book_contacts.secondary_contact') }}: {{ $addressContact->secondary_contact ? __('address_book_contacts.yes') : __('address_book_contacts.no') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection