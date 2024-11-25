@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $CompanyContact->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('company_contact.name') }}: {{ $CompanyContact->name }}</p>
                            <p>{{ __('company_contact.email') }}: {{ $CompanyContact->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('company_contact.phone') }}: {{ $CompanyContact->phone?: __(company_contact.not_provided) }}</p>
                            <p>{{ __('company_contact.company') }}: {{ $CompanyContact->company->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
