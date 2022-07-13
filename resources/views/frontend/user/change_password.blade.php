@extends('frontend.master')
@section('content')
<div class="container">
    <div class="row" class="table table-bordered table-striped dataTable dtr-inline">
        <div class="card" style="width: 100rem;">
            <div class="card-body">
            <form action="{{ url('/password_store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label>old-password</label>
                    <input type="password" class="form-control" placeholder="old password" name="old_password">
                   </div>
                   <div class="mb-3">
                    <label>new-password</label>
                    <input type="password" class="form-control" placeholder="new password" name="password">
                  </div>
                  <div class="mb-3">
                     <label>Confirm Password</label>
                     <input type="password" class="form-control" placeholder="confirm password" name="password_confirmation">
                   </div>
                    <br>
                     <button class="btn btn-info">save</button>
                 </form>
            </div>
          </div>
    </div>
</div>

@endsection
