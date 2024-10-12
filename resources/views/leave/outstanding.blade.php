@extends('layouts.app')

@section('content')
<div class="container">
    @if($outstandingLeaves->isEmpty())
        <p>No outstanding leave requests at the moment
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Half Day (AM/PM)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($outstandingLeaves as $leave)
                    <tr>
                        <td>{{ $leave->createdBy->name }}</td>
                        <td>{{ $leave->leaveType->name }}</td>
                        <td>{{ $leave->date_from }}</td>
                        <td>{{ $leave->date_to }}</td>
                        <td>
                            @if(leave->half_day_am)
                                AM
                            @elseif($leave->half_day_pm)
                                PM
                            @else
                                Full Day
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('leave.approve', $leave->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('leave.deny', $leave->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Deny</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection