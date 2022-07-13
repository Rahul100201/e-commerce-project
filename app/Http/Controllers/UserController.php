<?php

namespace App\Http\Controllers;

use App\Models\addres;
use App\Models\Address;
use App\Models\Cart;
use App\Models\order;
use App\Models\orderproduct;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;


class UserController extends Controller
{
    public function userlogin(){
        return view('frontend.signup');
    }
    public function profile(){
        if(Auth::check()){
            $user_email=Auth::user()->email;
            $data=addres::where('email',$user_email)->get();
            return view('frontend.profile',compact('data'));


        }


    }
    public function sign_up(Request $f){
        // $this->validate($f, [
        //     'name'=>'required',
        //     'email'=>'required | unique:users',
        //     'password'=>'required'

        // ]);
        $data=$f->all();
        $userCount=User::where('email',$data['email'])->count();
        if($userCount>0){
            Toastr::error('Email is already exist:)');
            return redirect()->back();
        }
        else{
            $user=new User();
            $user->name=$f->name;
            $user->email=$f->email;
            $user->password = Hash::make($f->password);
            $user->save();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Toastr::success('Registration Successfull:)');
                return redirect('/cart');
            }
        }


    }
    public function login_submit(Request $a){
        // print_r($a->all());
        // die;
        $session_id =Session::getId();;
        // echo $session_id;
        if($a->isMethod('post')){
            $data=$a->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
                Toastr::success('Log In Successfull :)');
                return redirect('/cart')->with('message','Login Successfull');


            }
            else{
                Toastr::error(' Enter Correct Email And Password:)');
                return redirect()->back()->with('message','Login Failed');
            }

         }
    }

    public function user_logout(){
        Auth::logout();
        Toastr::success('Log Out Successfull :( ');

        return redirect('/');

    }
    public function user_account(){
        return view('frontend.user.user_account');

    }
    public function your_orders(){
        if(Auth::check()){
            $user_email=Auth::user()->email;
            $order=order::where('user_email' ,$user_email)->get();
            //$order2=orderproduct::where('user_email',$user_email)->get();
            //  print_r($order->all());
            //  die;
            return view('frontend.user.your_orders',compact('order'));

        }


    }
    public function change_password(){
        // echo"<pre>";
        // print_r($r);
        // die;
        return view('frontend.user.change_password');

    }
    public function password_save(Request $a){
        $oldpass =Auth::user()->password;  //hashed
        // echo $oldpass;
        // die;
        if(Hash::check($a->old_password,$oldpass)){
           $user=User::find(Auth::id());
           $user->password=Hash::make($a->password);
           $user->save();
           //logout
        //    Auth::logout();
           Toastr::success('password update successfully :)');
           return redirect()->back();

        }
        else{
            Toastr::error('Enter the correct old password :(');
            return redirect()->back();
        }
    }

    public function change_address(){

        return view('frontend.user.change_address');

    }
    public function Add_address(Request $a){
       //dd($a);
       $data= new addres();
       $data->name=$a->name;
       $data->address=$a->address;
       $data->city=$a->city;
       $data->state=$a->state;
       $data->pincode=$a->pincode;
       $data->mobile=$a->mobile;
       $data->email=$a->email;
       $data->save();
       Toastr::success('Address Added successfully :)');
       return redirect()->back();

    }

}


