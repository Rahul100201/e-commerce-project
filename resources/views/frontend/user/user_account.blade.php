@extends('frontend.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <br>
            <div class="card-header">
                <h1>MY ACCOUNT</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                    <a href="{{ url('/user_account/your_orders') }}"><h5 class="card-title">Your Orders <p class="card-text">Track,return or buy things again</p></h5></a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                       <a href="{{ url('/user_account/change_password') }}"> <h5 class="card-title">Change Password<p class="card-text">Change your password</p></h5></a>
                    </div>
                  </div>
                </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
                   <a href="{{ url('/user_account/change_address') }}"><h5 class="card-title">Change Address<p class="card-text">Edit adress for orders</p></h5></a>
                  </div>
                </div>
              </div>
        </div>
        <br>
      </div>
    </div>
</div>
<br><br><br><br><br><br>

@endsection
