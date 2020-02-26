<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  Session;
use Str;


class adminController extends Controller
{


    public function index(){
        return view('admin.dashboard');
    }

    // Category function
    public function allCategory(){
        $data = DB::table('category')->get();
        return view('admin.allcategory',compact('data'));
    }

    public function addCategory(){
        return view('admin.addCategory');
    }

    public function add_category(Request $request){

        $request->validate([
            'name' => 'required',
            'publish_status' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->descrip,
            'publish_status' => $request->publish_status
        ];

        DB::table('category')->insert($data);
        Session::flash('success');
        return back();

    }

    public function active($id){
        DB::table('category')->where('id',$id)->update(['publish_status' => 0]);
        return back();
    }

    public function unactive($id){
        DB::table('category')->where('id',$id)->update(['publish_status' => 1]);
        return back();
    }

    public function edit_category($id){
        $edit_category_data = DB::table('category')->where('id',$id)->get();
        return view('admin.update_category',compact('edit_category_data'));
    }

    public function update_category(Request $request){
        $data  = [
            'name' => $request->name,
            'description' => $request->descrip
        ];
        $id =  $request->id;

        DB::table('category')->where('id',$id)->update($data);
        return redirect('categorys');
    }

    public function delete($id){
        DB::table('category')->where('id',$id)->delete();
        return back();
    }


  // Category function end.......









  // brand function ....................
    public function brads(){
        $allbrand = DB::table('brand')->get();
        return view('admin.brands',compact('allbrand'));
    }

    public function view_addBrand(){
        return view('admin.addBrand');
    }

    public function add_brabd(Request $request){
        $request->validate([
            'name' => 'required',
            'publish_status' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->descrip,
            'publish_status' => $request->publish_status,
            'quantity' => $request->quantity
        ];

        DB::table('brand')->insert($data);
        Session::flash('success');
        return back();
    }

    public function activeBrand($id){
        DB::table('brand')->where('id',$id)->update(['publish_status' => 0]);
        return back();
    }

    public function unactiveBrand($id){
        DB::table('brand')->where('id',$id)->update(['publish_status' => 1]);
        return back();
    }
    public function edit($id){
        $edit_data = DB::table('brand')->where('id',$id)->get();
        return view('admin.update',compact('edit_data'));
    }

    public function update(Request $request){
        $data  = [
            'name' => $request->name,
            'description' => $request->descrip,
            'quantity' => $request->quantity
        ];
        $id =  $request->id;

        DB::table('brand')->where('id',$id)->update($data);
        return redirect('allBrand');
    }

    public function delete_brand($id){
        DB::table('brand')->where('id',$id)->delete();
        return back();
    }

    // Brand  function end.......



    //Product function here....
    public function product_list(){
        $allProduct = DB::table('product')->get();
        return view('admin.product_list',compact('allProduct'));
    }

    public function product_form_view(){
        return view('admin.add_product');
    }

    public function add_product(Request $request){


        $data = array();
            $data['product_name'] = $request->name;
            $data['category_id'] = $request->category;
            $data['brand_id'] = $request->brand;
            $data['product_short_descrip'] = $request->short_descrip;
            $data['product_long_descrip'] = $request->long_descrip;
            $data['product_price'] = $request->price;
            $data['product_size'] = $request->size;
            $data['product_color'] = $request->color;
            $data['product_quantity'] = $request->quantity;
            $data['publication_status'] = $request->publish_status;


            $image = $request->file('image');
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_fullname;
            $image->move($upload_path,$image_fullname);


            $data['product_image'] = $image_url;


            $insert = DB::table('product')->insert($data);
            Session::flash('message','Product inserted success!');
            return redirect('/product_form_view');




    }

    public function unactive_product($id){
        DB::table('product')->where('id',$id)->update(['publication_status'=> 1]);
        return redirect('/product_list');
    }

    public function active_product($id){
        DB::table('product')->where('id',$id)->update(['publication_status'=> 0]);
        return redirect('/product_list');
    }




    public function edit_product($id){
        $edit_data = DB::table('product')->where('id',$id)->get();
        return view('admin.edit_product',compact('edit_data'));
    }

    public function update_product(Request $request){
        $request->validate([
            'category' => 'required',
            'quantity' => 'required',
            'brand' => 'required',
            'publish_status' => 'required',
            'image' => 'required'
        ]);

            $data = array();
            $data['product_name'] = $request->name;
            $data['category_id'] = $request->category;
            $data['brand_id'] = $request->brand;
            $data['product_short_descrip'] = $request->short_descrip;
            $data['product_long_descrip'] = $request->long_descrip;
            $data['product_price'] = $request->price;
            $data['product_size'] = $request->size;
            $data['product_color'] = $request->color;
            $data['product_quantity'] = $request->quantity;
            $data['publication_status'] = $request->publish_status;


            $image = $request->file('image');
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_fullname;
            $image->move($upload_path,$image_fullname);


            $data['product_image'] = $image_url;

            $id =  $request->id;

            $insert = DB::table('product')->where('id',$id)->update($data);
            Session::flash('message','Product inserted success!');
            if($insert){
                return redirect('/product_list');
            }
    }

    public function delete_product($id){
        DB::table('product')->where('id',$id)->delete();
        return back();
    }

    public function view_image($id){
        $select_image = DB::table('product')->where('id',$id)->get();
        return view('pages.image_view',compact('select_image'));
    }



    //Product function end....







    public function order_table()
    {
        return view('admin.order_table');
    }

    public function view_order($id){
        $customer_info = DB::table('shopper_info')->where('customer_id',$id)->get();
        $product_info = DB::table('product_order')->where('customer_id',$id)->get();

        return view('admin.order_view',['shopper_details'=>$customer_info,'product_details' =>$product_info]);
    }







}
