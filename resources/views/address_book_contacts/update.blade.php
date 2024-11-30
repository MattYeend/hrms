@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('address_book_contacts.edit') }} {{ $addressContact->name }}</div>
                <div class="card-body">
                    @include('address_book_contacts.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection