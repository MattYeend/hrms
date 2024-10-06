<p>
    Hi, <br>
    A new leave request has been submitted:<br>
    Leave type: {{ $leave->leaveType->name }}<br>
    From {{ $leave->date_from }} to {{ $leave->date_to }}
</p>
Thanks,<br>
{{ config('app.name') }}