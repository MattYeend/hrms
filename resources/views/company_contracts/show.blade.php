@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $contract->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('contract.name') }}: {{ $contract->name }}</p>
                            <p>{{ __('contract.start') }}: {{ $contract->start }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('contract.end') }}: {{ $contract->end }}</p>
                            <p>{{ __('contract.licence') }}: {{ $contract->licence->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection