<?php

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
//     return view('layout.index_content');
// });
use App\Http\Controllers\frontController;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;



Route::get('/','frontController@index');
Route::get('/admin',function(){
    return view('pages.admin_login');
});
Route::get('shop','frontController@shop');

Route::post('/login','administratorControll@administrator_login');
Route::get('/logout','administratorControll@logout');
//user registration
Route::get('user-login','frontController@user_login');
Route::post('user-singin','frontController@user_singin');
Route::post('user-signup','frontController@user_signup');
Route::get('user-panel','frontController@user_panel');


Route::group(['middleware' => ['administrator']], function () {

        // admin routes
        Route::get('/dashboard' , 'adminController@index');
        Route::get('/categorys' , 'adminController@allCategory');
        Route::get('/addCategory','adminController@addCategory');

        Route::post('/add_category','adminController@add_category');
        Route::get('/active/{id}','adminController@active');
        Route::get('/unactive/{id}','adminController@unactive');
        Route::get('/edit_category/{id}','adminController@edit_category');
        Route::post('/update_category','adminController@update_category');
        Route::get('/delete/{id}','adminController@delete');

        Route::get('/allBrand' ,'adminController@brads');
        Route::get('/view_addBrand' ,'adminController@view_addBrand');

        Route::post('/add_brabd', 'adminController@add_brabd');
        Route::get('/activeBrand/{id}','adminController@activeBrand');
        Route::get('/unactiveBrand/{id}','adminController@unactiveBrand');
        Route::get('/edit/{id}','adminController@edit');
        Route::post('/update','adminController@update');
        Route::get('/delete_brand/{id}','adminController@delete_brand');

        // Product Route

        Route::get('/product_list' ,'adminController@product_list');
        Route::get('/product_form_view' ,'adminController@product_form_view');
        Route::post('/add_product' ,'adminController@add_product');

        Route::get('/unactive_product/{id}','adminController@unactive_product');
        Route::get('/active_product/{id}','adminController@active_product');
        Route::get('/edit_product/{id}','adminController@edit_product');
        Route::post('/update_product','adminController@update_product');
        Route::get('/delete_product/{id}','adminController@delete_product');
        Route::get('/view_image/{id}','adminController@view_image');


        Route::get('order-table','adminController@order_table');
        Route::get('view-order-page/{id}','adminController@view_order');



});


//frontend routes
Route::get('show_slide' ,'frontController@show_slide');
Route::post('insert_image','frontController@insert_image');
Route::get('slide_list','frontController@slide_list');

Route::get('delete/{id}','frontController@image_delete');



Route::get('show_product_by_categoryId/{id}','frontController@show_product_by_categoryId');

Route::get('main','frontController@main');
Route::get('view_product_id/{id}','frontController@view_product');
Route::post('show_add_cart','frontController@show_add_cart');
Route::get('show_cart','frontController@view_cart');
Route::post('update_quantity','frontController@update_quantity');
Route::get('remove_cart/{id}','frontController@remove_cart');


// checkOut route....
Route::get('login_register_ui','checkoutController@login_register_ui');
//customer login and registration
Route::post('customer_login','checkoutController@customer_login');
Route::post('customer_register','checkoutController@customer_register');

Route::get('bill_to_ui','checkoutController@bill_to_ui');
Route::get('customer_logout','checkoutController@customer_logout');


Route::post('shopper_info','checkoutController@shopper_info');
Route::get('choice_payment_method','checkoutController@choice_payment_method');

Route::post('payment-register','checkoutController@payment_register');

Route::get('payment_ui','checkoutController@payment_ui');
Route::post('bil_pay','checkoutController@payment_action');

Route::get('pending/{id}','checkoutController@pending');
Route::get('working/{id}','checkoutController@working');


Route::get('cash-on-delivery','checkoutController@cash_on_delivery');
Route::get('bkash','checkoutController@bkash');
Route::get('online-payment','checkoutController@online_payment');
Route::get('success-payment',function (){
    return view('pay_method.success_payment');
});













