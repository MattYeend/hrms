@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a User</div>
                @include('users.partials.form')
            </div>
        </div>
    </div>
</div>
@endsection