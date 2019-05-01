@extends('layout.app')
@section('style')
    <style>
        .hero-image {

            background-image: linear-gradient(
                rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.7)
            ),url("images/searchWS.jpg");
            background-color: #cacbcc;
            /*padding-bottom: 50px ;*/
            height: 600px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            opacity: 0.8;
            filter: alpha(opacity=80);
        }
        .el-select .el-input {
            width: 150px;

        }
        .input-with-select{
            width: 80%;
        }
        .input-with-select .el-input-group__prepend {
            background-color: #dcddff;
        }
        .time {
            font-size: 13px;
            color: #999;
        }

        .bottom {
            margin-top: 13px;
            line-height: 12px;
        }

        .button {
            padding: 0;
            float: right;
        }

        .image {
            width: 100%;
            display: block;
        }

        .clearfix:before,
        .clearfix:after {
            display: table;
            content: "";
        }

        .clearfix:after {
            clear: both
        }
        el-card {
            max-height: 50%;
            width: 50px;
        }

    </style>
@endsection
@section('content')
    <div id="workspaceInfo">
        <div class="hero-image">
            <div class="container">
                <div style="padding-top: 30px; padding-left: 180px; padding-bottom: 50px">
                    <el-input placeholder="Search with Workspace Name" v-model="name" class="input-with-select">
                        <el-select v-model="searchRegion.city_id" slot="prepend" placeholder="Select City"  v-on:change="onChange">
                            <el-option v-for="city in city"
                                       :key="city.city_id"
                                       :value="city.city_id"
                                       :label="city.city_name"></el-option>
                        </el-select>
                        <el-select style="padding-left: 40px;" v-model="searchRegion.region_id" slot="prepend" placeholder="Select Region" v-on:change="searchByRegion">
                            <el-option v-for="region in region"
                                       :key="region.region_id"
                                       :value="region.region_id"
                                       :label="region.region_name"></el-option>
                        </el-select>
                        <el-button slot="append" icon="el-icon-search" @click="searchByName"></el-button>
                    </el-input>
                </div>
                <el-row :gutter="20">
                    <el-col  :span="8" v-for="ws in workspaces" :key="ws.ws_id">
                        <el-card shadow="hover" :body-style="{ padding: '0px' }" >
                            <img style="height: 200px" :src="'/'+ws.img_url"  class="image">
                            <div style="padding: 14px;">
                                <h3>@{{ ws.ws_name }}</h3>
                                <div class="bottom clearfix">
                                    <p>@{{ ws.description }}</p>
                                    <el-button @click="userMail(ws.ws_id)" type="text" class="button">See Details</el-button>
                                </div>
                            </div>
                            <el-dialog
                                title="Details"
                                :visible.sync="dialogVisible"
                                width="50%"
                                >
                                {{--<span>Write your Mail to Send the Details .</span>--}}
                                <el-input placeholder="ex: John@Mail.com" v-model="user.mail" class="input-with-select">
                                    <el-button slot="append" icon="el-icon-circle-check" @click="sendmail">Send Mail</el-button>
                                </el-input>
                                <span slot="footer" class="dialog-footer">
                                    <el-button @click="dialogVisible = false">CANCEL</el-button>
                                  </span>
                            </el-dialog>
                        </el-card>
                    </el-col>
                </el-row>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/workspaceInfo.js')}}"></script>

@endsection
