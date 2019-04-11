<?php
session()->regenerate();
if(Session('id')==null){
    echo "ليس لديك الصلاحيات للدخول على تلك الصفحة";
}else{
    }
    ?>

@extends('layout.app')

@section('content')
    <a class="btn badge-light" href="{{ url('main/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
        Logout
    </a>
    <form id="frm-logout" action="{{ url('main/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
<div class="col-sm-12 imagecontainer"></div>
<div class="container">
    <div class="row">
            <div class="col-md-12" style="margin-top: 25px ; margin-bottom:10px;">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="requests-tab" data-toggle="tab" href="#requests" role="tab" aria-controls="requests" aria-selected="true"><b>Show Requests</b></a></li>
                <!-- <li class="nav-item"><a class="nav-link" id="product-tab" data-toggle="tab" href="#activate" role="tab" aria-controls="activate" aria-selected="true"><b>Customers Activate </b></a></li>
                <li class="nav-item"><a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="true"><b>Change Password</b></a></li>
                <li class="nav-item"><a class="nav-link" id="logout-tab" data-toggle="tab" href="#logout" role="tab" aria-controls="logout" aria-selected="true"><b>Logout</b></a></li> -->
              </ul>
            </div>
    </div>
    <!-- ////////////////////////////////////////// -->

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="requests" role="tabpanel" aria-labelledby="requests-tab">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">phone</th>
            <th scope="col">Commercial Register</th>
            <th scope="col">Request</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user_requests as $request)
            <tr>
            <th scope="row">{{$request->id}}</th>
            <td>{{$request->user_name}}</td>
            <td>{{$request->email}}</td>
            <td>{{$request->user_phone}}</td>
            <td><a href="{{ URL('commercialRegister/'.$request->commercial_register )}}">Preview</a></td>
            <td>
                <a href="{{ URL('acceptRequest/'.$request->id )}}" class="btn btn-primary btn-sm">Accept</a>
                <a href="{{ URL('deleteRequest/'.$request->id )}}" class="btn btn-danger btn-sm"><span style="color:white;">Reject</span></a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>


        </div>
    </div>

</div>

@endsection
