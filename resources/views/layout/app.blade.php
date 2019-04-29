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
{{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
<script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('style')

    <style>
        a{
            text-decoration: none;
            /*padding: 14px 25px;*/
        }

        .imagecontainer {
            padding-left: 0;
            padding-right: 0;

            opacity: 1.0;
            background: url(../images/DenizYolu-tasima.jpg) no-repeat center center;
            /*background-size: cover;*/
            background-attachment: fixed;
        }

    </style>
</head>
<body>
    <div id="searchWS">
        <el-menu
            :default-active="activeIndex"
            class="el-menu-demo"
            mode="horizontal"
            @select="handleSelect"
            background-color="#545c64"
            text-color="#fff"
            active-text-color="#ffd04b">
            <el-menu-item><img  src="images/workspace.png" style="height:120% ;width: 50%;padding: -190px; " alt="">We Make Things easy , We Save Time</el-menu-item>
            <el-menu-item index="1"><a href="{{ URL('/' )}}">Home</a></el-menu-item>
            <el-menu-item index="2"><a href="{{ URL('/searchWS' )}}">Search WorkSpace</a></el-menu-item>
             @if(Session()==null)
                <el-menu-item index="3"><a href="{{ URL('/signIn' )}}">Login</a></el-menu-item>
            @endif
            @if(Session()!=null)
            <el-menu-item index="3"><a href="{{ URL('/logout' )}}">Logout</a></el-menu-item>
            @endif
            <el-menu-item index="4"><a href="{{ URL('/registration' )}}">Registration</a></el-menu-item>
        </el-menu>



    </div>
@yield('content')


    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

</body>
<!-- import Vue before Element -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://unpkg.com/vue/dist/vue.js"></script>
  <!-- import JavaScript -->
  <script src="https://unpkg.com/element-ui/lib/index.js"></script>
  @yield('scripts')
  <script src="{{asset('js/searchWS.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

{{--<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>--}}
</html>
