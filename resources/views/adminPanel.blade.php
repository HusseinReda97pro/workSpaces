@extends('layout.app')

@section('content')
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
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>photo</td>
            <td>
                <button class="btn btn-primary btn-sm">Accept</button>
                <button class="btn btn-danger btn-sm">Reject</button>
            </td>
            </tr>
        </tbody>
        </table>

                
        </div>
    </div>
    <!-- //////////////////////////////////
    <div class="tab-pane fade" id="activate" role="tabpanel" aria-labelledby="activate-tab">
        Hey
    </div> -->
</div>
    
@endsection