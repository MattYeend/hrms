<p>
    Hi {{ $leave->createdBy->name }},<br>
    Unfortunately, your leave has been denied because of {{ $leave->negative_status_reason }}
</p>
Thanks,<br>
{{ config('app.name') }}