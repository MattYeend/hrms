@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            @if(isset($user) && $user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="profile_picture" class="profile-picture-circle">
                            @endif
                            <p>{{ __('users.first_line') }}: {{ $user->first_line }}</p>
                            <p>{{ __('users.second_line') }}: {{ $user->second_line?:'Not Provided' }}</p>
                            <p>{{ __('users.town') }}: {{ $user->town?:'Not Provided' }}</p>
                            <p>{{ __('users.city') }}: {{ $user->city?:'Not Provided' }}</p>
                            <p>{{ __('users.county') }}: {{ $user->county?:'Not Provided' }}</p>
                            <p>{{ __('users.country') }}: {{ $user->country?:'Not Provided' }}</p>
                            <p>{{ __('users.post_code') }}: {{ $user->post_code }}</p>
                            <p>{{ __('users.full_or_part') }}: {{ $user->full_or_part }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('users.phone') }}: {{ $user->phone }}</p>
                            <p>{{ __('users.salary') }}: {{$currencySymbol}}{{ number_format($user->salary,2) }}</p>
                            <p>{{ __('users.department') }}: {{ $user->department->name }}</p>
                            <p>{{ __('users.role') }}: {{ $user->role->name }}</p>
                            <p>{{ __('users.seniority') }}: {{ $user->seniority->name }}</p>
                            <p>{{ __('users.job') }}: {{ $user->job->name }}</p>
                            <p>{{ __('users.holiday_entitlement') }}: {{ $user->holidayEntitlement->total }}</p>
                            <p>{{ __('users.contact') }}: {{ $user->contact->name }}</p>
                        </div>
                        @if($canViewSensitiveDocs)
                            <div class="mt-4">
                                <h5>{{ __('users.sensitive_documents') }}</h5>
                                <p>{{ __('users.contains_sensitive_docs') }}</p>
                                @if(isset($user) && $user->cv_path)
                                    <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank">{{ __('users.download_cv') }}</a>
                                @endif

                                @if(isset($user) && $user->cover_letter)
                                    <a href="{{ asset('storage/' . $user->cover_letter) }}" target="_blank">{{ __('users.download_cover_letter') }}</a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
