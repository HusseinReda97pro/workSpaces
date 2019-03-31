@extends('layout.app')

@section('content')
<div class="col-sm-12 imagecontainer"></div>
<div>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Welcome {{$user_name}} ! </h4>
  <p>Your Account isn't activated yet , We supposed you didn't pay for our sevice.</p>
  <hr>
  <p class="mb-0">Whenever your payment reaches for us , you will be able to launch you Workspace.</p>
  <a href="{{ URL::previous() }}" class="alert-link">Back Home ? </a>
</div>
</div>
@endsection