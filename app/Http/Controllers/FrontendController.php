<?php

namespace App\Http\Controllers;

use App\Models\addres;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\order;
use App\Models\orderproduct;
use App\Models\Product;
use App\Models\productimage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Cartalyst\Sentinel\Sentinel;
use Stringable;

class FrontendController extends Controller
{
    public function index(){
        $banner=Banner::latest()->get();
        $category=Category::latest()->get();
        $product=Product::latest()->get();
        // echo"<pre>";
        // print_r($banner);
        // die();
        return view('frontend.index',compact('banner','category','product'));
    }
    public function product_details($id){
        $product_details=Product::find($id);
        $product=Product::latest()->get();
        $category=Category::latest()->get();
        $add_image=productimage::where('product_id',$id)->get();
        // echo"<pre>";
        // print_r($product_details);
        // die();
        return view('frontend.product_details',compact('product_details','product','add_image','category'));

    }
    public function quickview(){
        $product=Product::latest()->get();
        return view('frontend.master',compact('product'));

    }

    public function add_to_cart(Request $request)
    {
        $session_id = Session::getId();
        // echo "<pre>";
        // print_r($session_id);
        // die;
        $data = new Cart();
        $data->product_id = $request->product_id;
        $data->product_name = $request->product_name;
        $data->product_image = $request->product_image;
        $data->product_price = $request->product_price;
        $data->product_quantity = $request->quantity;
        $data->session_id = $session_id;
        if(Auth::check()){
            $data->user_email=Auth::user()->email;
        }

        $data->save();
        Toastr::success('Item Added successfully :)');
        return redirect('cart');
    }


    public function addtocart(){
        //$cart=Cart::latest()->get();
         $session_id = Session::getId();
        if(Auth::check()){
            $user_email=Auth::user()->email;
            $cart=Cart::where('user_email',$user_email)->get();

        }
        else{
            $cart = Cart::where('session_id',$session_id)->latest()->get();
        }
        return view('frontend.addtocart',compact('cart'));
    }
    public function checkout(){
        if(Auth::check()){
            $session_id = Session::getId();
            $user_email=Auth::user()->email;
            $cart=Cart::where('user_email',$user_email)->get();
            $data=addres::where('email',$user_email)->get();
            Toastr::success('Checking You to your Cart :)');
            return view('frontend.checkout',compact('cart','data'));

        }
        else{
        $session_id = Session::getId();
        $cart = Cart::where('session_id',$session_id)->latest()->get();
        return view('frontend.checkout',compact('cart'));
        }
    }
    public function delete($id){
        $cat = Cart::find($id);
        $cat->delete();
        Toastr::success('Item deleted successfully :)');
        return redirect()->back();
    }
    public function signup(){
        return view('frontend.signup');

    }

    public function categories(){
        $cat=Category::all();
        return view('frontend.categories',compact('cat'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function customer(){
        return view('frontend.customer');
    }
     public function contact(){
        return view('frontend.contact');
    }
    public function track(){
        return view('frontend.track');
    }
    public function place_order(Request $a){
        // echo"<pre>";
        // print_r($a->all());
        $data1= new order();
        //$data->database field_name=$a->form_field_name
        //$data->name=$a->p_name;
        $data1->user_id=Auth::user()->id;
        $data1->user_email=$a->email;
        $data1->name=$a->name;
        $data1->address=$a->address;
        $data1->city=$a->city;
        $data1->pin_code=$a->zip;
        $data1->payment_method=$a->payment_method;
        $data1->order_status='pending';
        $data1->phone_num=$a->phone;
        $data1->state=$a->country;
        $data1->grand_total=$a->grandtotal;
        $data1->order_id= Str::random(10);
        $data1->save();
        $o_id = DB::getPdo()->lastInsertID();
        // print_r($o_id);
        // die;
        $p_item=Cart::where('user_email',$data1->user_email)->get();
        // echo"<pre>";
        // print_r($p_item);
        foreach($p_item as $item){
            $data=new orderproduct();
            $data->order_id=$o_id;
            $data->user_id=Auth::user()->id;
            $data->user_email=$item->user_email;
            $data->product_name=$item->product_name;
            $data->product_image=$item->product_image;
            $data->product_price=$item->product_price;
            $data->product_quantity=$item->product_quantity;
            $data->save();
        }
        if($a->payment_method=='cod'){

            return redirect('Thanks');
        }
        elseif($a->payment_method=='paytm'){
            //echo'paytm';
            echo $amount=$a->grandtotal;
            echo $order_id=$data1->order_id;
            $data_for_request = $this->handlePaytmRequest( $order_id, $amount );
            // print_r($data_for_request);
            // die;


            $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
            $paramList = $data_for_request['paramList'];
            $checkSum = $data_for_request['checkSum'];

            return view( 'paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );


        }
        elseif($a->payment_method=='cod'){
            echo'cod';
            // return redirect('Thanks');
        }

    }
    public function thanks(){
        $user_email=Auth::user()->email;
        Cart::where('user_email',$user_email)->delete();
        return view('frontend.thanks');
    }

    public function view_categories($id){
        $data= Product::where('category_id',$id)->get();
         return view('frontend.view_categories', compact('data'));
       }

       public function search(Request $a){
        $this->validate($a, ['search' => 'required|max:255']);
        $search = $a->search;
        $products = Product::where('product_name', 'like', "%$search%")->paginate(10);
        $products->appends(['search' => $search]);
        $categories = Category::all();
        // echo "<pre>";
        // print_r($products);
        // die();
        return view('frontend.search',compact('categories','products','search'));

    }


    public function forget_password(){
        return view('frontend.forget');

    }










    //paytmcode
    public function handlePaytmRequest( $order_id, $amount ) {
        // Load all functions of encdec_paytm.php and config-paytm.php
        $this->getAllEncdecFunc();
        $this->getConfigPaytmSettings();

        $checkSum = "";
        $paramList = array();

        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = 'wYwEKi38822158347077';
        $paramList["ORDER_ID"] = $order_id;
        $paramList["CUST_ID"] = $order_id;
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $amount;
        $paramList["WEBSITE"] = 'WEBSTAGING';
        $paramList["CALLBACK_URL"] = url( '/paytm-callback' );
        $paytm_merchant_key = 'AWv9%oRRLUI3CBfM';

    //Here checksum string will return by getChecksumFromArray() function.
    $checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

    return array(
        'checkSum' => $checkSum,
        'paramList' => $paramList
    );
}

public function paytmCallback( Request $request ) {
    //return $request;
    $order_id = $request['ORDERID'];

    if ( 'TXN_SUCCESS' === $request['STATUS'] )
     {
        $transaction_id = $request['TXNID'];
        $order = order::where( 'order_id', $order_id )->first();
        $order->payment_status = 'complete';
        $order->transaction_id = $transaction_id;
        $order->save();
        // $user_email = Auth::user()->email;
        // Cart::where('user_email',$user_email)->delete();
        // $category = Category::all();
        // $data = order::where('user_email',$user_email)->first();
        return view('frontend.thanks');

      } else if( 'TXN_FAILURE' === $request['STATUS'] ){
        return view('frontend.payment-failed');
    }
}

public function getAllEncdecFunc(){


    function encrypt_e($input, $ky) {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
        return $data;
    }
    function decrypt_e($crypt, $ky) {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
        return $data;
    }
    function generateSalt_e($length) {
        $random = "";
        srand((double) microtime() * 1000000);
        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";
        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }
        return $random;
    }
    function checkString_e($value) {
        if ($value == 'null')
            $value = '';
        return $value;
    }
    function getChecksumFromArray($arrayList, $key, $sort=1) {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = getArray2Str($arrayList);
        $salt = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = encrypt_e($hashString, $key);
        return $checksum;
    }
    function getChecksumFromString($str, $key) {

        $salt = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = encrypt_e($hashString, $key);
        return $checksum;
    }
    function verifychecksum_e($arrayList, $key, $checksumvalue) {
        $arrayList = removeCheckSumParam($arrayList);
        ksort($arrayList);
        $str = getArray2StrForVerify($arrayList);
        $paytm_hash = decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);
        $finalString = $str . "|" . $salt;
        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;
        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }
    function verifychecksum_eFromStr($str, $key, $checksumvalue) {
        $paytm_hash = decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);
        $finalString = $str . "|" . $salt;
        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;
        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }
    function getArray2Str($arrayList) {
        $findme   = 'REFUND';
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pos = strpos($value, $findme);
            $pospipe = strpos($value, $findmepipe);
            if ($pos !== false || $pospipe !== false)
            {
                continue;
            }

            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
    function getArray2StrForVerify($arrayList) {
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
    function redirect2PG($paramList, $key) {
        $hashString = getchecksumFromArray($paramList);
        $checksum = encrypt_e($hashString, $key);
    }
    function removeCheckSumParam($arrayList) {
        if (isset($arrayList["CHECKSUMHASH"])) {
            unset($arrayList["CHECKSUMHASH"]);
        }
        return $arrayList;
    }

    function getTxnStatus($requestParamList) {
        return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
    }
    function getTxnStatusNew($requestParamList) {
        return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
    }
    function initiateTxnRefund($requestParamList) {
        $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
        $requestParamList["CHECKSUM"] = $CHECKSUM;
        return callAPI(PAYTM_REFUND_URL, $requestParamList);
    }
    function callAPI($apiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData))
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }
    function callNewAPI($apiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData))
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }
    function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = getRefundArray2Str($arrayList);
        $salt = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = encrypt_e($hashString, $key);
        return $checksum;
    }
    function getRefundArray2Str($arrayList) {
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pospipe = strpos($value, $findmepipe);
            if ($pospipe !== false)
            {
                continue;
            }

            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
    function callRefundAPI($refundApiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $refundApiURL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }

        }

        function getConfigPaytmSettings(){

            define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
            define('PAYTM_MERCHANT_KEY', 'EBPwh5dj_XmW1L7%'); //Change this constant's value with Merchant key received from Paytm.
            define('PAYTM_MERCHANT_MID', 'EbtGYn83534967686723'); //Change this constant's value with MID (Merchant ID) received from Paytm.
            define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/order/status';
            $PAYTM_TXN_URL='https://securegw-stage.paytm.in/order/process';
            if (PAYTM_ENVIRONMENT == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }
            define('PAYTM_REFUND_URL', '');
            define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
            define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
            define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
        }


}
