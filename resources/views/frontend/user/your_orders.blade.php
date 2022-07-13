@extends('frontend.master')
@section('content')
<div class="container">
   <div class="row">
        <div class="card">
            <br>
            <div class="title">
                <h3>MY ORDERS</h3>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Ordered Product</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Grand Total</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Generate Invoice</th>
                    </tr>
                    @foreach ($order as $o)
                    <tr>
                        <td>{{ $o->id }}</td>
                       <td>
                        @foreach ($o->order_p as $op)
                        {{ $op->product_name }}
                        @endforeach
                       </td>
                        <td>{{ $o->payment_method    }}</td>
                        <td>RS.{{ $o->grand_total }}</td>
                        <td>{{ $o->created_at->format('D, d M Y H:i')}}</td>
                        <td>{{ $o->order_status }}</td>
                        <td> <a href="{{ url('invoice/'.$o->id) }}" class="btn btn-danger">Invoice</a></td></td>

                    </tr>
                     @endforeach
                </thead>
                </table>
            </div>
        </div>
   </div>

@endsection


