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
