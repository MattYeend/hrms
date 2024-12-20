@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('emailLogs.emailLogs') }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('emailLogs.recipient') }}</th>
                <th>{{ __('emailLogs.subject') }}</th>
                <th>{{ __('emailLogs.sent_at') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emailLogs as $log)
                <tr>
                    <td>{{ $log->recipient_email }}</td>
                    <td>{{ $log->subject }}</td>
                    <td>{{ $log->sent_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
