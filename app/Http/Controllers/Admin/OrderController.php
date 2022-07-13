<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderproduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view_orders(){
        $order=order::with('order_p')->orderBy('id','desc')->get();
        // echo"<pre>";
        // print_r($order);
        // die;
        return view('Admin.order.order',compact('order'));
    }
    public function order_details($id){
        $order=orderproduct::where('order_id',$id)->get();
        return view('Admin.order.order_details',compact('order'));

    }
    public function invoice($id){
        $order=orderproduct::where('order_id',$id)->get();
        $order2=order::where('id',$id)->get();
        return view('Admin.order.invoice',compact('order','order2'));

    }
}
