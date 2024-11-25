@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('company_contact.edit') }} {{ $companyContact->name }}</div>
                <div class="card-body">
                    @include('company_contacts.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection