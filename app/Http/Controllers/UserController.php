<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{  
    function login(Request $req)
    {
        //CHECK USER IS EXISTES OT NOT
        $user=user::where(['email'=>$req->email])->first();

        //CHECK PASSWORD MATCH OT NOT
        if(!$user || !Hash::check($req->pwd,$user->pwd))
        {
            //IF NOT MATCH REDIRECT AGAIN SAME PAGE
            return redirect('/login');
        }
        else
        {
            //STORE USER ID IN A SESSION
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    
    function register(Request $req)
    {  
        function randomDigits($length){
           $digits = '';
           $numbers = range(0,9);
           shuffle($numbers);
           for($i = 0; $i < $length; $i++)
           {
               global $digits;
               $digits .= $numbers[$i];
           }
           return $digits;
        }
        function random($length){
            $pin = '';
            $num = range(0,9);
            shuffle($num);
            for($i = 0; $i < $length; $i++)
            {
                global $pin;
                $pin .= $num[$i];
            }
            return $pin;
        }

        //GENERATE RANDOM 10 DIGIT ACCOUNT NUMBER
        $account_number =   randomDigits(10);

        //GENERATE RANDOM 4 DIGIT PIN NUMBER 
        $pin            =   random(4);

        //STORE USER INFORMATION IN USER TABLE
        $user           =   new user;
        $id             =   $req->id;
        $user->Fname    =   $req->fname;
        $user->Lname    =   $req->lname;
        $user->MobileNo =   $req->number;
        $user->email    =   $req->email;
        $user->pwd      =   Hash::make($req->pwd);
        $user->dob      =   $req->dob;
        $user->Gender   =   $req->gen;
        $user->State    =   $req->state;
        $user->City     =   $req->city;
        $user->Address  =   $req->address;
        $user->pincode  =   $req->pin;
        $user->save();

        //PASS THE CURRENT USER INFORMATION TO CREATE ACCOUNT PAGE
        $data   =   user::where('email',$req->input('email'))->get();
        return view('/user/registeraccount',['user_id'=>$data,'account_no'=>$account_number,'pin_no'=>$pin]);
    }
}
