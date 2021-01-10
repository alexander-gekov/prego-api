<!DOCTYPE html>
<html>
<head>
    <title>Appointment Check In</title>
</head>
<body>

<h1>You have an appointment</h1>
<p>Your visitor ({{$data['appointment']['first_name']}} {{$data['appointment']['last_name']}}) has checked in!</p>
<ul>
    <li>Start Time: {{$data['appointment']['date_start']}}</li>
</ul>

</body>
</html>
