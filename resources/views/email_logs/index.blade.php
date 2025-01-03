@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('email_logs.email_logs') }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('email_logs.recipient') }}</th>
                <th>{{ __('email_logs.subject') }}</th>
                <th>{{ __('email_logs.sent_at') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($emailLogs as $log)
                <tr>
                    <td>{{ $log->recipient_email }}</td>
                    <td>{{ $log->subject }}</td>
                    <td>{{ $log->sent_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{{ __('email_logs.no_emails') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
