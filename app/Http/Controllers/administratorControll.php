<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  Session;
use Str;
class administratorControll extends Controller
{
    public function administrator_login(Request $request){


        $email = $request->administrator_email;
        $password = $request->administrator_password;

        if(!empty($email) && !empty($password)){
            $login = DB::table('administration')->where('administrator_email',$email)->where('administrator_password',$password)->first();
            if($login){
                Session::put('username',$request->administrator_email);
                return redirect('/dashboard');
            }else{
                $username= DB::table('administration')->first();
                if($username){
                    session()->flash('incorrect','Your email and password are incorrect!');
                    return redirect('/admin');
                }else{
                    $data = [
                        'administrator_name' =>$request->administrator_name,
                        'administrator_email' =>$request->administrator_email,
                        'administrator_password' =>$request->administrator_password
                    ];

                    DB::table('administration')->insert($data);
                    session()->flash('message','Your registartion is success! please login ');
                    return redirect('/admin');
                }

            }
        }else{
            return back()->with('email','Email field is required')->with('password','Password field is required');
        }



    }


//     logout ..................

    public function logout(){
        Session::flush();
        return redirect('/admin');
    }


    //security function
//    public function administrator_valid(){
//        $valid = Session::get('username');
//
//        if($valid){
//            return;
//        }else{
//            return redirect('/admin')->send();
//        }
//    }

    // public function __construct(){
    //     $this->administrator_valid();
    // }
}
