<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <form method="post" action={{url('/api/deleteAppointment/'.$id)}}>
        <h1 class="title">Are you sure you want to cancel your Appointment ?</h1>
        <button type="submit" class="confirm">Confirm</button>
        @method('delete')
        @csrf
    </form>
</div>
</body>
</html>

<style>
    .title{
        text-align: center;
        margin-top: 50px;
    }
    .confirm{
        background-color: #a779e9;
        border-radius: 5px;
        font-weight: bold;
        border: 0px;
        margin-top: 50px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding: 15px 40px;
        font-size: 20px;
    }
    .confirm:hover{
        transition: 0.2s;
        background-color: #704e9c;
    }
</style>
