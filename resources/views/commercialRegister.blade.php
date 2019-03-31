@extends('layout.app')

@section('content')
<div class="col-sm-12 imagecontainer"></div>
<div class="container">
<img class="card-img-top" src='{{asset($photo)}}' alt="Card image cap">
</div>
@endsection