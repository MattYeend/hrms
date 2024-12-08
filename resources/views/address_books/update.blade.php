@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('address_book.edit') }} {{ $addressBook->name }}</div>
                <div class="card-body">
                    @include('address_books.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection