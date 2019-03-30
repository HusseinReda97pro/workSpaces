<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Workplace</title>

    <link rel="dns-prefetch"  href="https://fonts.gstatic.com" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">

    <script src="{{asset('js/app.js')}}"></script>
    <style>
        .imagecontainer {
    padding-left: 0;
    padding-right: 0;
    min-height: 250px;
    background: url(../images/DenizYolu-tasima.jpg) no-repeat center center;
    background-size: cover;
    background-attachment: fixed;
}

    </style>
</head>
<body>
    
    
    <div id="app">
        @yield('content')
    </div>
   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
</html>