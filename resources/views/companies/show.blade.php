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
                            <p>{{ __('companies.name') }}: {{ $user->first_line }}</p>
                            <p>{{ __('companies.company_contact') }}: {{ $user->second_line?:'Not Provided' }}</p>
                            <p>{{ __('companies.pay_day') }}: {{ $user->town?:'Not Provided' }}</p>
                            <p>{{ __('companies.active') }}: {{ $user->city?:'Not Provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('companies.work_weekdays') }}: {{ $user->county?:'Not Provided' }}</p>
                            <p>{{ __('companies.contract') }}: {{ $user->country?:'Not Provided' }}</p>
                            <p>{{ __('companies.address') }}: {{ $user->post_code }}</p>
                            <p>{{ __('companies.company_relationship_manager') }}: {{ $user->full_or_part }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
