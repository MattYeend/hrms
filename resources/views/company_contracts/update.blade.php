@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('contracts.edit') }} {{ $contract->name }}</div>
                <div class="card-body">
                    @include('company_contracts.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection