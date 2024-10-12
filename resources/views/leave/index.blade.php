@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <calendar-component></calendar-component>
                </div>

                <div class="col-md-2 d-flex justify-content-center">
                    <div class="table-responsive">
                        <a href="{{ route('leave.create') }}" class="btn btn-primary">{{ __('leave.create_holiday') }}</a>
                        @if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin() || auth()->user()->cSuite() || (auth()->user()->department && auth()->user()->department->dept_lead_id === auth()->user()->id))
                            <a href="{{ route('leave.outstanding') }}" class="btn btn-warning mb-3">{{ __('leave.outstanding_requests') }}</a>
                        @endif
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>{{ __('leave.total') }}</th>
                                    <th>{{ __('leave.taken') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $holiday_entitlement }}</td>
                                    <td>{{ $total_leaves_taken }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
