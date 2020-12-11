<!DOCTYPE html>
<html>
<head>
    <title>Appointment from Prego</title>
</head>
<body>

<h1>You have an appointment </h1>
<p>This email is sent as a reminder for your appointment: </p>
<ul>
    <li>Start Time: {{$data['appointment']['date_start']}}</li>
    {{--    <li>End Time: {{$data['appointment']->date_end}}</li>--}}
    <li>Employee: {{$data['employee']}}</li>
</ul>
<p>When you are at the location, you can check in using this QR code.</p>

</body>
</html>
