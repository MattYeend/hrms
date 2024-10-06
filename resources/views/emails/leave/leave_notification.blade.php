<p>
    Hi, <br>
    A new leave request has been submitted:<br>
    Leave type: {{ $leave->leaveType->name }}<br>
    From {{ $leave->date_from }} to {{ $leave->date_to }}
</p>
<p>
    Please review the request and choose one of the following options:<br>
    <a href="{{ route('leaves.approve', $leave->id) }}" style="background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Approve</a>
    <a href="{{ route('leaves.deny', $leave->id) }}" style="background-color: #dc3545; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Deny</a>
</p>
Thanks,<br>
{{ config('app.name') }}