@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $job->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('job.name') }}: {{ $job->name }}</p>
                            <p>{{ __('job.code') }}: {{ $job->code ?? __('job.not_provided') }}</p>
                            <p>{{ __('job.salary_range') }}: {{ $job->salary_range }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('job.description') }}: {{ $job->description ?? __('job.not_provided') }}</p>
                            <p>{{ __('job.expectations') }}: {{ $job->expectations ?? __('job.not_provided') }}</p>
                            <p>{{ __('job.probation_length') }}: {{ $job->probation_length ?? __('job.not_provided') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
