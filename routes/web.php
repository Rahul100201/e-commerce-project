<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify'=>true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home' , [FrontendController::class , 'index']);

//admin/dashboardcontroller
Route::get('admin/dashboard' , [DashboardController::class , 'dashboardview']);





//admin/categorycontroller
Route::get('admin/dashboard/category' , [CategoryController::class , 'categoryview']);
Route::post('admin/categary/register' , [CategoryController::class , 'store']);
Route::delete('category/delete/{id}' , [CategoryController::class , 'delete']);
Route::put('admin/categary/update/{id}' , [CategoryController::class , 'update']);

//admin/bannercontroller
Route::get('admin/dashboard/banner' , [BannerController::class , 'bannertable']);
Route::post('admin/dashboard/banner/register' , [BannerController::class , 'bannerstore']);
Route::delete('admin/banner/delete/{id}' , [BannerController::class , 'delete']);
Route::put('admin/banner/update/{id}' , [BannerController::class , 'update']);

//admin/productcontroller
Route::get('admin/dashboard/product' , [ProductController::class , 'producttable']);
Route::post('product/register' , [ProductController::class , 'productstore']);
Route::delete('product/delete/{id}' , [ProductController::class , 'delete']);
Route::put('admin/product/update/{id}' , [ProductController::class , 'update']);

//admin/order controller



//frontend controller
Route::get('/' , [FrontendController::class , 'index']);
Route::get('product_details/{id}' , [FrontendController::class , 'product_details']);
Route::get('/categories' , [FrontendController::class , 'categories']);
Route::get('/about' , [FrontendController::class , 'about']);
Route::get('/categories' , [FrontendController::class , 'categories']);
Route::get('/customer' , [FrontendController::class , 'customer']);
Route::get('/contact' , [FrontendController::class , 'contact']);
Route::get('/track_order' , [FrontendController::class , 'track']);
Route::post('place_order',[FrontendController::class,'place_order']);
Route::get('Thanks',[FrontendController::class,'thanks']);
Route::get('view_categories/{id}',[FrontendController::class,'view_categories']);

//add image controller
Route::get('admin/product/add_image/{id}' , [ProductController::class , 'add_image']);
Route::post('admin/dashboard/product/store' , [ProductController::class , 'store']);



//addtocart
// Route::get('/cart' , [FrontendController::class , 'addtocart'])->middleware('verified');
// Route::post('/addtocart' , [FrontendController::class , 'add_to_cart'])->middleware('verified');
Route::get('/cart' , [FrontendController::class , 'addtocart']);
Route::post('/addtocart' , [FrontendController::class , 'add_to_cart']);

//checkout
Route::get('/checkout' , [FrontendController::class , 'checkout']);
Route::get('delete/{id}' , [FrontendController::class , 'delete']);


//ordercontroler
Route::get('admin/orders' , [OrderController::class , 'view_orders']);
Route::get('order_details/{id}' , [OrderController::class , 'order_details']);
Route::get('invoice/{id}' , [OrderController::class , 'invoice']);



//login k lliye
Route::post('/login_submit',[UserController::class,'login_submit']);




//user controller
Route::get('/signup' , [UserController::class , 'userlogin']);
Route::post('/sign_up',[UserController::class,'sign_up']);
Route::get('/user_login',[UserController::class,'userlogin']);
Route::get('/user_profile',[UserController::class,'profile']);
Route::get('/user_account',[UserController::class,'user_account']);
Route::get('/user_logout',[UserController::class,'user_logout']);
Route::get('/user_account/your_orders',[UserController::class,'your_orders']);
Route::get('/user_account/change_password',[UserController::class,'change_password']);
Route::get('/user_account/change_address',[UserController::class,'change_address']);
Route::post('/password_store',[UserController::class,'password_save']);






//paytm callback rout
Route::post('/paytm-callback',[FrontendController::class,'paytmCallback']);




//search controller
Route::get('/search', [FrontendController::class, 'search'])->name('search');



//forget password using email
Route::get('/forget_password',[FrontendController::class,'forget_password']);
Route::post('/forget',[FrontendController::class,'password']);



// Google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/login/google/callback', [LoginController::class, 'handleGoogleCallback']);


//change address
Route::post('/add_address',[UserController::class,'add_address']);





//clear command
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});
