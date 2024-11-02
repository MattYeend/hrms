<p>Hi {{ $assignee->first_name }},</p>
<p>You've been assigned to a new L&D by {{$assignedBy}}</p>
<p>Please visit <a href="{{ url('learning/' . $learning->id) }}">here</a> to see</p>