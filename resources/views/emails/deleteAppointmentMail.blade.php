<!DOCTYPE html>
<html>
<head>
    <title>Appointment Removed</title>
</head>
<body>

<h1>Your appointment has been removed.</h1>
<p style="font-size: 14px">Dear, Mr/Mrs <b>{{$appointment->first_name . " " . $appointment->last_name }}</b>
    your appointment with <b>{{$employee->first_name . " " . $employee->last_name}}</b>
    at <b>{{(date_create($appointment->date_start))->format('Y-m-d H:i')}}</b> has been removed.</p>
<h5 style="padding-top: 10px" >We recommend contacting {{$employee->first_name . " " . $employee->last_name}} for more info.</h5>
</body>
</html>
