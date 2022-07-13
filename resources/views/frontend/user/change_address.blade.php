@extends('frontend.master')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 shadow">
                <h2 class="mb-2">Add address</h2>
                <br>
                <form action="{{ url('add_address') }}" method="post" class="form-group">
                    @csrf


                    <div class=" mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" value="{{Auth::user()->name }}">
                    </div>
                    <div class=" mb-3">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class=" mb-4">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city" placeholder="city">
                    </div>
                    <label for="exampleDataList" class="form-label">State</label>
                        <input class="form-control" type="text" name="state" placeholder="select One">
                    <div class=" mb-4">
                        <label for="">Pincode</label>
                        <input type="text" class="form-control" name="pincode" placeholder="pincode">
                    </div>
                    <div class=" mb-3">
                        <label for="">Mobile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="mobile">
                    </div>
                    <div class=" mb-4">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email"  value="{{ Auth::user()->email }}" placeholder="email">
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-info" type="submit" >submit</button>
                    </div>

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>



@endsection
