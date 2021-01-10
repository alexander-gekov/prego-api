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
    <li>Duration: {{$data['duration']}} min</li>
    <li>Employee: {{$data['employee']}}</li>
</ul>
<p>When you are at the location, you can check in using this QR code.</p>
<img src="{!!$message->embedData(QrCode::format('png')->size(200)->generate($data['appointment']['qr_id']), 'QrCode.png', 'image/png')!!}">
<br>
{{--<a href="http://localhost:8000/deleteAppointment/{{$data['appointment']['qr_id']}}">Cancel this appointment ?</a>--}}
<a href="{{url("/api/deleteAppointment/".$data['appointment']['qr_id'])}}">Cancel this appointment ?</a>
</body>
</html>

<script>

</script>
