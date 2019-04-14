@extends('layout.app')
@section('style')
    <style>
        .el-menu-vertical-demo:not(.el-menu--collapse) {
            width: 200px;
            min-height: 400px;
        }
        .link-handle-font a{
            color: white;
            text-decoration: none;
        }
        .link-handle-font a:active {
            color: #ffed4a;
        }
        /*Side Nav*/
        .sidenav {
            height: 380px;
            width: 220px;
            /*position: fixed;*/
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #3c3c3c;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 40px;
            text-decoration: none;
            font-size: 17px;
            color: lightgrey;
            display: block;
            transition: color , font-size .5s;
        }
        .sidenav a i {
            padding-right: 10px;
        }
        .sidenav a i:hover {
            padding-right: 10px;

        }

        .sidenav a:hover {
            color: white;
            background-color: #909295;
            font-size: 18px;
            color: #ffe924;
        }

        .main {
            margin-left: 160px; /* Same as the width of the sidenav */
            font-size: 14px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

    </style>

@endsection
@section('content')
        {{--<el-container style="height: 500px; border: 1px solid #eee">--}}
            {{--<el-aside width="200px" style="background-color: rgb(238, 241, 246)">--}}
        <div class="row">
            <div class="col col-md-2">
            <div class="sidenav">
                <a href={{url('/showRequests')}}><i class="fas fa-glasses"></i>Show Requests</a>
                <a href="{{url('/pendingRequests')}}"><i class="fas fa-glasses"></i>Pending Requests</a>
                <a href="{{url('/citiesRegions')}}"><i class="fas fa-city"></i>Cities & Regions</a>
                <a href="{{url('/addPayment')}}"><i class="fab fa-cc-mastercard"></i>Add Payment</a>
                <img src="{{asset('images/workspace.png')}}" id="icon" alt="Workspace logo" style="width:180px ; lenght:140px; padding-left: 30px; "/>
            </div>
            </div>
            <div class="col col-md-10">
                @yield('adminPanelContent')
            </div>
        </div>


            {{--<el-col :span="20"><div class="grid-content bg-purple-light">--}}
                    {{----}}
                {{--</div>--}}

            {{--</el-col>--}}





@endsection
@section('scripts')
    {{--<script src="{{asset('js/panelLayout.js')}}"></script>--}}
    @yield('adminPanelScript')
@endsection
