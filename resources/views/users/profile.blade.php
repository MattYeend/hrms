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
                    <div class="float-left">
                        <p>First Line: {{ $user->first_line }}</p>
                        <p>Second Line: {{ $user->second_line?:'Not Provided' }}</p>
                        <p>Town: {{ $user->town?:'Not Provided' }}</p>
                        <p>City: {{ $user->city?:'Not Provided' }}</p>
                        <p>County: {{ $user->county?:'Not Provided' }}</p>
                        <p>Country: {{ $user->country?:'Not Provided' }}</p>
                        <p>Postcode: {{ $user->post_code }}</p>
                        <p>Full/Part Time: {{ $user->full_or_part }}</p>
                    </div>
                    <div class="float-right">
                        <p>Phone: {{ $user->phone }}</p>
                        <p>Salary: {{$currencySymbol}}{{ number_format($user->salary,2) }}</p>
                        <p>Department: {{ $user->department->name }}</p>
                        <p>Role: {{ $user->role->name }}</p>
                        <p>Seniority: {{ $user->seniority->name }}</p>
                        <p>Job: {{ $user->job->name }}</p>
                        <p>Holiday Entitlement: {{ $user->holidayEntitlement->total }}</p>
                        <p>Contact: {{ $user->contact->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
