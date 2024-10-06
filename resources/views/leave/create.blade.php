@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Holiday</h1>
    <form action="{{ route('leave.store') }}" method="POST">
        @csrf
        @if(isset($leave))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="date_from">Date From</label>
            <input type="date" name="date_from" id="date_from" class="form-control" value="{{ old('date_from', isset($leave) ? $leave->date->from : '') }}">
        </div>

        <div class="form-group">
            <label for="date_to">Date To</label>
            <input type="date" name="date_to" id="date_to" class="form-control" value="{{ old('date_to', isset($leave) ? $leave->date->to : '') }}">
        </div>

        <div class="form-group">
            <label for="leave_type_id">Leave Type</label>
            <select name="leave_type_id" id="leave_type_id" class="form-control">
                @foreach($leaveTypes as $leaveType)
                    <option value="{{ $leaveType->id }}" {{ old('leave_type_id', isset($leave) && $leave->leave_type_id == $leaveType->id ? 'selected' : '')}}>
                        {{ $leaveType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="half_day_am">Half Day AM</label>
            <input type="checkbox" name="half_day_am" id="half_day_am" value="1" {{ old('half_day_am', isset($leave) && leave->half_day_am ? 'checked' : '') }}>
        </div>

        <div class="form-group">
            <label for="half_day_pm">Half Day PM</label>
            <input type="checkbox" name="half_day_pm" id="half_day_pm" value="1" {{ old('half_day_pm', isset($leave) && leave->half_day_pm ? 'checked' : '') }}>
        </div>

        <button type="submit" class="btn btn-primary">Create Holiday</button>
    </form>
</div>
@endsection