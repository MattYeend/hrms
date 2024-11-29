@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $companyContact->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('address_book.first_line') }}: {{ $addressBook->first_line }}</p>
                            <p>{{ __('address_book.second_line') }}: {{ $addressBook->second_line ?? __(address_book.not_provided) }}</p>
                            <p>{{ __('address_book.town') }}: {{ $address->town ?? __(address_book.not_provided) }}</p>
                            <p>{{ __('address_book.city') }}: {{ $address->city ?? __(address_book.not_provided) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('address_book.county') }}: {{ $addressBook->county?: __(address_book.not_provided) }}</p>
                            <p>{{ __('address_book.contry') }}: {{ $addressBook->country }}</p>
                            <p>{{ __('address_book.post_code') }}: {{ $addressBook->post_code }}</p>
                            <p>{{ __('address_book.head_office') }}: {{ $addressBook->head_office }}</p>
                            <p>{{ __('address_book.address_contact') }}: {{ $addressBook->addressContact->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection