@extends('layout.app')
@section('style')
    <style>
        html, body {
            height: 100%;
        }
        header {
            height: 90%;
        }

    </style>
    @endsection
@section('content')
<div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

    <!-- Header -->
    <header class="masthead" id="home">
        <div class="container">
          <div class="intro-text">
            {{--<img  src="images/workspace.png" alt="">--}}
            <br><br>
            <div style="font-size:25px;" class="intro-lead-in">Registrate Your Workspace with us</div>
            <div class="intro-heading text-uppercase">Be Reachable</div>
            <button type="button" class="btn btn-primary btn-lg">Show Workspaces</button>
          </div>
        </div>
      </header>
@endsection
