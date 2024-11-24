@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $company->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('companies.name') }}: {{ $company->name }}</p>
                            <p>{{ __('companies.company_contact') }}: {{ $company->companyContact->name ?? __('companies.not_provided') }}</p>
                            <p>{{ __('companies.pay_day') }}: {{ $company->pay_day }}</p>
                            <p>{{ __('companies.active') }}: {{ $company->active ? '__('companies.yes') : __('companies.no') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('companies.work_weekdays') }}: {{ $company->work_weekends ? __('companies.yes') : __('companies.no') }}</p>
                            <p>{{ __('companies.contract') }}: {{ $company->contract->name ?? __('companies.not_provided') }}</p>
                            <p>{{ __('companies.address') }}: {{ $company->addressBook->first_line }}<br />
                                                {{ $company->addressBook->country }}<br />
                                                {{ $company->addressBook->post_code }}</p>
                            <p>{{ __('companies.company_relationship_manager') }}: {{ $company->companyRelationshipManager->name ?? __('companies.not_provided') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
