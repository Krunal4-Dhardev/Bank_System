<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use Session;
use Validator;
class DepositController extends Controller
{
    function deposit(Request $req)
    {
        $rule=array(
            "Amount"=>"required",
            "captcha"=>"required"
        );
        //CHECK CAPTCHA CODE IS VALID OR NOT
        $validator=Validator::make($req->all(),$rule);
        
        if($validator->fails())
        {
            return view('user/depositAmount');
        }
        else
        {
            //GET USER DETAILS AND DEPOSIT AMOUNT 
            $balance=Balance::where("userid","=",session::get('user')['id'])->first();

            if($balance)
            {
                $balance->Balance   =   ($balance->Balance+$req->Amount);
                $balance->save();
                return redirect('/');
            }
        }

    }
}
