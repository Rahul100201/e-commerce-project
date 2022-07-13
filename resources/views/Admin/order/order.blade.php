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
                  <th scope="col">ORDER ID</th>
                  <th scope="col">ORDER DATE</th>
                  <th scope="col">CUSTOMER NAME</th>
                  <th scope="col">CUSTOMER EMAIL</th>
                  <th scope="col">ORDERED PRODUCT</th>
                  <th scope="col">ORDER AMOUNT</th>
                  <th scope="col">ORDER STATUS</th>
                  <th scope="col">PAYMENT METHOD</th>
                  <th scope="col">TRANSACTION ID</th>
                  <th scope="col">ACTION</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($order as $o)
               <tr>
                  <td>{{ $o->id }}</td>
                  <td>{{ $o->created_at }}</td>
                  <td>{{ $o->name }}</td>
                  <td>{{ $o->user_email }}</td>
                  <td>
                     @foreach ($o->order_p as  $p)
                     {{ $p->product_name }}
                     ({{ $p->product_quantity }})
                     @endforeach
                  </td>
                  <td>Rs. {{ $o->grand_total }}</td>
                  <td>{{ $o->order_status }}</td>
                  <td>{{ $o->payment_method}}</td>
                  <td>{{ $o->transaction_id}}</td>
                  <td> <a href="{{ url('order_details/'.$o->id) }}" class="btn btn-primary">Order Details</a>
                  <a href="{{ url('invoice/'.$o->id) }}" class="btn btn-danger">Invoice</a></td>

               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
