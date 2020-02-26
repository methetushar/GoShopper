<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use mysql_xdevapi\Table;
use Session;
use Cart;
use Mail;
use App\Mail\goshopperMail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
class checkoutController extends Controller
{
    public function  login_register_ui()
    {
        return view('pages.login_register_ui');
    }

    //Customer login

    public function customer_login(Request $request)
    {
        $email = $request->customer_email;
        $pass = $request->customer_password;
        $token = $request->_token;

        $password = md5($pass);
        if (!empty($email) && !empty($password)){
            $validate = DB::table('customer_register')->where(['customer_email'=>$email])->where(['customer_password'=>$password])->first();
            if ($validate){
                $check = DB::table('customer_register')->where('customer_email',$request->customer_email)->get();
                foreach ($check as $id){
                    $customer_id = $id->customer_id;
                    Session::put('customer_id',$customer_id);
                }
                Session::put('customer',$request->customer_email);
                return view('pages.bill_to_ui',compact('email'));
            }else{
                return back()->with('not-match','Your email and password are incorrect!');
            }
        }else{
            return back()->with('email','Email field is required!')->with('password','Password field is required!');
        }
    }

    // Customer registration

    public function customer_register(Request $request)
    {
        $name = $request->customer_name;
        $email = $request->customer_email;
        $password = $request->customer_password;
        $number = $request->customer_number;
        $token = $request->_token;
        $customer_id = rand(1111,9999);
        $data = [
            'customer_id' => $customer_id,
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_password' => md5($password),
            'customer_number' => $number,
            'token' => $token,
        ];

        if (!empty($name) && !empty($email) && !empty($password) && !empty($number)){
            if(strlen($number) < 11 || strlen($number) > 11 ){
                return  back()->with('number_not_valid','Please enter a validate number ');
            }
            $check = DB::table('customer_register')->where('customer_email',$email)->first();
            if ($check){
                return back()->with('email_already_used','This email already used!');
            }else{
                $insert_data = DB::table('customer_register')->insert($data);
                if ($insert_data){
                    Session::put('customer',$request->customer_email);
                    Session::put('customer_id',$customer_id);
                    return view('pages.bill_to_ui',compact('email'));
                }
            }

        }else{
            return back()->with('name','Name field is required!')
                         ->with('register_email','Email field is required!')
                         ->with('register_password','Password field is required!')
                         ->with('number','Number field is required!');
        }

    }




    public function bill_to_ui()
    {
        return view('pages.bill_to_ui');
    }

    public  function  customer_logout()
    {
        Session::flush();

        return redirect('/');
    }


    public function shopper_info(Request $request)
    {
        $customer_id = Session::get('customer_id');

        $shooper_data = [
            'customer_id' =>$customer_id,
            'name' => $request->shopper_name,
            'email' => $request->shopper_email,
            'password' => $request->shopper_password,
            'address' => $request->shopper_address,
            'product_receiver_name' => $request->receiver_name,
            'product_received_location' => $request->location,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'shopper_phone' => $request->shopper_phone,
            'product_receiver_phone' => $request->receiver_phone,
            'status' => $request->check_confirm,
        ];

        $insert_shopper_info = DB::table('shopper_info')->insert($shooper_data);

            if ($insert_shopper_info) {

            $cart_data = Cart::content();
            foreach ($cart_data as $data) {
                $product_id = $data->id;
                $product_name = $data->name;
                $product_price = $data->price;
                $product_quantity = $data->qty;
                $product_image = $data->options->image;


                $total_price = Cart::total();
                $customer_id = Session::get('customer_id');
                $p_data =DB::table('product')->where('id',$product_id)->get();
                foreach ($p_data as $p_v_data) {
                    $product_data = [
                        'customer_id' => $customer_id,
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_quantity' => $product_quantity,
                        'product_image' => $product_image,
                        'product_total_price' => $total_price,
                        'product_size' => $p_v_data->product_size,
                        'product_color' => $p_v_data->product_color,
                        'receiver_name' => $request->receiver_name,
                        'receiver_location' => $request->location,
                        'receiver_number' => $request->receiver_phone,
                        'zip_code' => $request->zip_code,
                    ];

                    $insert_data = DB::table('product_order')->insert($product_data);
                    }
                    if ($insert_data) {
                        return redirect('choice_payment_method');
                    }


            }

        }

    }
    public  function  choice_payment_method(){
        return view('pages.choice_pay_method');
    }

    public  function payment_register(Request $request){
        $pay = [
          'payment_method' => $request->payment,
          'payment_status' => 1
        ];
        $payment_id = DB::table('payment_info')->insertGetId($pay);

        $customer_id = Session::get('customer_id');
        $shopping_data = DB::table('shopper_info')->where('customer_id',$customer_id)->get();
        $total_amount = Cart::total();
        foreach ($shopping_data as $s_data){
            $order_data = [
                 'customer_id' => $customer_id,
                 'shipping_id' => $s_data->id,
                 'payment_id' => $payment_id,
                 'total_amount' => $total_amount,
                 'order_status' => 1,
            ];
            $order_id = DB::table('order_info')->insertGetId($order_data);

        }
        $product_data = Cart::content();
        foreach ($product_data as $p_data) {
            $id = $p_data -> id;
            $product_quantity = $p_data -> qty;
            $product_name = $p_data -> name;
            $product_price = $p_data -> price;

            $order_details = [
                'order_id' => $order_id,
                'product_id' => $id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,

            ];
            $order_push  = DB::table('details_of_order')->insert($order_details);
            if ($order_push){
                $customer_email = Session::get('customer');
                $customer_id = Session::get('customer_id');
                $get_product_data = DB::table('product_order')->where('customer_id',$customer_id)->get();
                $get_customer_data = DB::table('customer_register')->where('customer_id',$customer_id)->get();
                Mail::to($customer_email)->send( new goshopperMail($product_quantity,$product_name,$product_price,$get_customer_data,$get_product_data));

                Cart::destroy();

                if ($request->payment  === 'cash_on_delivery'){
                    return redirect('/cash-on-delivery');
                }elseif($request->payment  === 'bkash'){
                    return redirect('/bkash');
                }elseif($request->payment  === 'online_payment'){
                    return redirect('/online-payment');
                }else{
                    return back()->with('not_selected', 'Please select a payment method');
                }
            }
        }


    }

    public  function cash_on_delivery(){
        return view('pay_method.cash_on_delivery');
    }
    public  function bkash(){
        return view('pay_method.bkash');
    }
    public  function online_payment(){
        return view('pay_method.online_payment');
    }








    public  function  payment_ui(){
        return view('pages.payment');
    }



    public  function payment_action(Request $request)
    {
        $total_amount = Cart::total();
        $pay = Stripe::charges()->create(
            [
                'amount' =>$total_amount,
                'currency' => 'BDT',
                'source' => $request->stripeToken,
                'description' => $request->email,
                'receipt_email' => 'tushar@gmail.com',
                'metadata' => [
                        'name'=> $request->name,
                ],
            ]
        );

        if ($pay){
            return redirect('/success-payment');
        }

    }

    public  function pending($id)
    {
        $update = DB::table('product_order')->where('id',$id)->update(['order_status' => 1]);
        if ($update){
            return back();
        }
    }

    public  function working($id)
    {
        $update = DB::table('product_order')->where('id',$id)->update(['order_status' => 2]);
        if ($update){
            return back();
        }
    }













}
