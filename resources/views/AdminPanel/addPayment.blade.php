{{--@extends('layout.app')--}}
@extends('AdminPanel.panelLayout')
<?php
session()->regenerate();
if(Session('id')==1){
    echo "ليس لديك الصلاحيات للدخول على تلك الصفحة";
    exit();
}else{
}   ?>
@section('adminPanelContent')
    <div id="addPayment">
        <div class="container text-center">
            <div class="row">
                {{--<div class="col col-md-2"></div>--}}

                <form method="post" action="/addPaymenttoDb"  style="padding:10px 0px 20px 0px ">
                    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

                    @csrf

{{--                    {{csrf_field()}}--}}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex. Al-Ahly , CIB etc.." name="Bank_Name" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bank Account</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ex. John Doe" name="Bank_Account" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bank Number</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ex. 2300 0012 1123" name="Bank_Number" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Swift Code</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ex. 01212" name="Swift_Code" required>
                    </div>

                    <div class="form-group">
                    <button style="margin-top: 30px;" type="submit" class="btn btn-primary">insert</button>
                    </div>
                </form>
            </div>
        </div>

                @endsection
@section('adminPanelScript')
    <script src="{{asset('js/adminShowRequests.js')}}"></script>
@endsection
