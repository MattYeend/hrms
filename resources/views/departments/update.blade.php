@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('departments.edit') }}</div>
                <div class="card-body">
                    @include('departments.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection