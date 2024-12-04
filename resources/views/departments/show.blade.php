@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $department->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('departments.name') }}: {{ $department->name }}</p>
                            <p>{{ __('departments.company->name') }}: {{ $department->company->name ?? __('departments.not_provided') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('departments.dept_lead') }}: {{ $department->departmentLead->getName() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
