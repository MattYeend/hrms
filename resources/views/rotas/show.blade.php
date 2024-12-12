@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('rotas.view') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('rotas.user') }}: {{ $rota->user->getFullNameLong() }}</p>
                            <p>{{ __('rotas.department') }}: {{ $rota->department->name ?? __('rotas.not_provided') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('rotas.start_time') }}: {{ \Carbon\Carbon::parse($rota->start_time)->format('d/m/y H:i') }}</p>
                            <p>{{ __('rotas.end_time') }}: {{ \Carbon\Carbon::parse($rota->end_time)->format('d/m/y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection