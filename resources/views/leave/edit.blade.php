@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('leave.update_holiday') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('leave.update', $leave->id) }}" method="PUT">
                        @csrf
                        @if(isset($leave))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="date_from">{{ __('leave.date_from') }}</label>
                            <input type="date" name="date_from" id="date_from" class="form-control" value="{{ old('date_from', isset($leave) ? $leave->date->from : '') }}">
                        </div>

                        <div class="form-group">
                            <label for="date_to">{{ __('leave.date_to') }}</label>
                            <input type="date" name="date_to" id="date_to" class="form-control" value="{{ old('date_to', isset($leave) ? $leave->date->to : '') }}">
                        </div>

                        <div class="form-group">
                            <label for="leave_type_id">{{ __('leave.leave_type') }}</label>
                            <select name="leave_type_id" id="leave_type_id" class="form-control">
                                @foreach($leaveTypes as $leaveType)
                                    <option value="{{ $leaveType->id }}" {{ old('leave_type_id', isset($leave) && $leave->leave_type_id == $leaveType->id ? 'selected' : '')}}>
                                        {{ $leaveType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="half_day_am">{{ __('leave.half_day_am') }}</label>
                            <input type="checkbox" name="half_day_am" id="half_day_am" value="1" {{ old('half_day_am', isset($leave) && leave->half_day_am ? 'checked' : '') }}>
                        </div>

                        <div class="form-group">
                            <label for="half_day_pm">{{ __('leave.half_day_pm') }}</label>
                            <input type="checkbox" name="half_day_pm" id="half_day_pm" value="1" {{ old('half_day_pm', isset($leave) && leave->half_day_pm ? 'checked' : '') }}>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('leave.update_holiday') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection