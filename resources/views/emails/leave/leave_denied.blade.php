<p>
    Hi {{ $leave->createdBy->getName() }},<br>
    Unfortunately, your leave has been denied because of {{ $leave->negative_status_reason }}
</p>
Thanks,<br>
{{ config('app.name') }}