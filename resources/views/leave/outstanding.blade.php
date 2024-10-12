@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('leave.outstanding_requests') }}</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('leave.employee_name') }}</th>
                    <th>{{ __('leave.leave_type') }}</th>
                    <th>{{ __('leave.status') }}</th>
                    <th>{{ __('leave.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($outstandingLeaves as $leave)
                    <tr>
                        <td>{{ $leave->createdBy->name }}</td>
                        <td>{{ $leave->leaveType->name }}</td>
                        <td>
                            @if($leave->half_day_am)
                                AM
                            @elseif($leave->half_day_pm)
                                PM
                            @else
                                Full Day
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('leave.approve', $leave) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">{{ __('leave.approve') }}</button>
                            </form>
                            <form action="{{ route('leave.deny', $leave) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">{{ __('leave.deny') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">{{ __('leave.no_outstanding_requests') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection