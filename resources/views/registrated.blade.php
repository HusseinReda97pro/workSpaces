@extends('layout.app')

@section('content')
<div class="col-sm-12 imagecontainer"></div>
<div>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome {{$user_name}} ! </h4>
  <p>Your Request has been Submitted <strong>Successfully</strong>.</p>
  <p>If your data is right , we will Mail you soon With your <strong>Dashboard Account & Payment Info</strong>.</p>
  <hr>

  <p class="mb-0">Whenever your payment reaches for us , you will be able to launch you Workspace.</p>
  <p class="mb-0"><small>Thanks For Being With us .</small></p>
  <a href="{{ URL::previous() }}" class="alert-link">Back ? </a>
</div>
</div>
@endsection