<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Workplace</title>

    <link rel="dns-prefetch"  href="https://fonts.gstatic.com" />
<!-- import CSS -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <style>
        .imagecontainer {
    padding-left: 0;
    padding-right: 0;
    min-height: 250px;
    opacity: 1.0;
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
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue/dist/vue.js"></script>
  <!-- import JavaScript -->
  <script src="https://unpkg.com/element-ui/lib/index.js"></script>
  @yield('scripts')
  <script src="{{asset('js/tryelement.js')}}"></script>
<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
</html>