@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $licence->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('licence.name') }}: {{ $licence->name }}</p>
                            <p>{{ __('licence.price') }}: {{ $licence->price ?? __('licences.not_provided') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('licence.created_by') }}: {{ $licence->created_by->first_name ? __('licences.yes') : __('licences.no') }}</p>
                            <p>{{ __('licence.updated_by') }}: {{ $licence->updated_by->first_name ?? __('licences.not_provided') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
