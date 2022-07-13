@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong class="card-title">Data Table</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ORDER ID</th>
                        <th>USER ID</th>
                        <th>USER EMAIL</th>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT IMAGE</th>
                        <th>PRODUCT PRICE</th>
                        <th>PRODUCT QUANTITY</th>

                    </tr>
                </thead>
                @foreach ($order as $o)
                <tbody>
                    <tr>
                        <td>{{ $o->order_id }}</td>
                        <td>{{ $o->user_id }}</td>
                        <td>{{ $o->user_email }}</td>
                        <td>{{ $o->product_name }}</td>
                        <td><img src="{{ url('/upload/product/'.$o->product_image) }}" style="height: 100px; margin-left:18px;"></td>
                        <td>Rs. {{ $o->product_price}}</td>
                        <td>{{ $o->product_quantity }}</td>

                    </tr>



                </tbody>
                @endforeach

            </table>
        </div>
    </div>
</div>



@endsection
