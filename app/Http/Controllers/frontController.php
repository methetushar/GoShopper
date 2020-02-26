<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use DB;
use Str;
use Cart;
use Session;
class frontController extends Controller
{
    public  function user_login()
    {
        return view('layout.user_login_ui');
    }
    public  function user_singin(Request $request)
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
                Session::put('customer_id',$request->customer_id);
                return view('layout.home');
            }else{
                return back()->with('not-match','Your email and password are incorrect!');
            }
        }else{
            return back()->with('email','Email field is required!')->with('password','Password field is required!');
        }
    }
    public  function user_signup(Request $request)
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
            $check = DB::table('customer_register')->where('customer_email',$email)->first();
            if ($check){
                return back()->with('email_already_used','This email already used!');
            }else{
                if(strlen($number) < 11 || strlen($number) > 11 ){
                    return  back()->with('number_not_valid','Please enter a validate number ');
                }
                $insert_data = DB::table('customer_register')->insert($data);
                if ($insert_data){
                    Session::put('customer',$request->customer_email);
                    Session::put('customer_id',$request->customer_id);
                    return view('layout.home');
                }
            }

        }else{
            return back()->with('name','Name field is required!')
                ->with('register_email','Email field is required!')
                ->with('register_password','Password field is required!')
                ->with('number','Number field is required!');
        }
    }

    public  function user_panel()
    {
        return view('pages.user_panel');
    }

    public function index(){

        return view('layout.home');
    }




    public function  main(){

        return view('main_layout');
    }
    public  function shop()
    {
        return view('pages.all_produce');
    }
    public function show_slide(){
        return view('pages.slide_add');
    }

    public function insert_image(Request $request){
        $request->validate([
            'file' => 'required'
        ]);



        $image = $request->file('file');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_fullname = $image_name.'.'.$ext;
        $upload_path = 'slider_img/';
        $image_url = $upload_path.$image_fullname;
        $image->move($upload_path,$image_fullname);


        $image_data['image_name'] = $image_url;

       $insert_image =  DB::table('slider')->insert($image_data);

       if ($insert_image){
           return back()->with('success','Image uploaded success!');
       }
    }


    public function slide_list()
    {
       $select_slider_image = DB::table('slider')->get();
       return view('pages.sliders',compact('select_slider_image'));
    }

    public function image_delete($id)
    {
        $select = DB::table('slider')->where('id',$id)->delete();
        return back();
    }

    public function  show_product_by_categoryId($id)
    {
        $select_product_by_categoryId = DB::table('product')->where('category_id',$id)->where(['publication_status' => 1])->get();
        return view('pages.show_product_by_categoryId',compact('select_product_by_categoryId'));
    }

    public function view_product($id)
    {
        $select_from_product = DB::table('product')->where('id',$id)->get();
        return view('pages.view_product',compact('select_from_product'));
    }

    public function show_add_cart(Request $request)
    {
        $product_id = $request->product_id;

        $quantity = $request->quantity;
        $get_products = DB::table('product')->where('id',$product_id)->first();
        $weight = 56;


        $data['qty'] = $quantity;
        $data['id'] = $get_products->id;
        $data['name'] = $get_products->product_name;
        $data['price'] = $get_products->product_price;
        $data['weight'] = $weight;
        $data['options']['image'] = $get_products->product_image;

        Cart::add($data);

        return redirect('/show_cart');
    }

    public  function  view_cart(){
        return view('pages.show_cart');
    }

    public function update_quantity(Request $request){
        $rowId = $request->rowId;
        $quantity = $request->quantity;

        Cart::update($rowId,$quantity);

        return back();
    }

    public  function  remove_cart($id)
    {
        Cart::remove($id);
        return back();

    }
















}
