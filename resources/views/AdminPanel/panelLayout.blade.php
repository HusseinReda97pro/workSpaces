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

    </style>

@endsection
@section('content')
    <div id="panelLayout">
        {{--<el-container style="height: 500px; border: 1px solid #eee">--}}
            {{--<el-aside width="200px" style="background-color: rgb(238, 241, 246)">--}}
        <el-row class="tac">
            <el-col :span="4">
                <el-menu
                    default-active="1"
                    class="el-menu-vertical-demo"
                    @open="handleOpen"
                    @close="handleClose"
                    background-color="#545c64"
                    text-color="#fff"
                    active-text-color="#ffd04b">
                    <el-menu-item index="1">
                        <i class="el-icon-menu"></i>
                        <span
                            class="link-handle-font"
                        >
                            <a href={{url('')}}>Show Requests</a>
                        </span>
                    </el-menu-item>
                    <el-menu-item index="2">
                        <i class="el-icon-menu"></i>
                        <span
                            class="link-handle-font"
                        >
                            <a href={{url('')}}>pending Requests</a>
                        </span>
                    </el-menu-item>
                    <el-menu-item index="3">
                        <i class="el-icon-menu"></i>
                        <span
                            class="link-handle-font"
                        >
                            <a href={{url('')}}>Add Cities & Regions</a>
                        </span>
                    </el-menu-item>
                    <el-menu-item index="4">
                        <i class="el-icon-menu"></i>
                        <span
                            class="link-handle-font"
                        >
                            <a href='#'>Add payment info</a>
                        </span>
                    </el-menu-item>


                </el-menu>
            </el-col>
            <el-col :span="12"><div class="grid-content bg-purple-light">
                    @yield('adminPanelContent')
                </div>

            </el-col>
        </el-row>

    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/panelLayout.js')}}"></script>
    @yield('adminPanelScript')
@endsection
