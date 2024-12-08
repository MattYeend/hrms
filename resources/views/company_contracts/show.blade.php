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
                            <p>{{ __('contracts.name') }}: {{ $contract->name }}</p>
                            <p>{{ __('contracts.start') }}: {{ $contract->start->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('contracts.end') }}: {{ $contract->end->format('d/m/Y') }}</p>
                            <p>{{ __('contracts.licence') }}: {{ $contract->licence->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
