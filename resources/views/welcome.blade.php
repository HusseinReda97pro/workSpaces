@extends('layout.app')

@section('content')
<div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                    <!-- <img src="img/logo.png" style="width:30% ; height:80%;" alt="" title=""> -->
                  <h1><span>Work</span>Space</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a  href="#home">Home</a>
                  </li>
                  <li>
                    <a  href="#about">About</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
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
            <img  src="images/workspace.png" alt="">
            <div style="font-size:25px;" class="intro-lead-in">Registrate Your Workspace with us</div>
            <div class="intro-heading text-uppercase">Be Reachable</div>
            <a class="btn btn-primary btn-md text-uppercase" href="{{ url('signIn') }}">Login</a>
            <a class="btn btn-primary btn-md text-uppercase" href="{{ url('registrate') }}">Registrate</a>

          </div>
        </div>
      </header>
@endsection