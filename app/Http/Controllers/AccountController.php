<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Balance;
use App\Models\Transaction;
use Session;
class AccountController extends Controller
{
    function accountInfo(Request $req)
    {    
        //STORE ACCOUNT INFORMATION 
        $account=new Account;
        $account->id_user       =   $req->u_id;
        $account->Account_no    =   $req->account_no;
        $account->PIN           =   $req->pin_number;
        $account->Pan_Card      =   $req->pan_number;
        $account->Aadhar_Card   =   $req->Aadhar_no;
        $account->Income        =   $req->income;
        $account->Occupation    =   $req->occu;
        $account->Account_type  =   $req->account_type;
        $account->save();

        //MAKE A TRANSACTION HISTORY 
        $transaction = new Transaction;
        $transaction->userid         =  $req->u_id;
        $transaction->touserid       =  0; 
        $transaction->amount         =  $req->amount;
        $transaction->Description    =  'Deposit while Account creation';
        $transaction->Type           =  'CREDIT';
        $transaction->status         =  true;
        $transaction->save();

        //USER AMOUNT WILL STORE IN BALANCE TABALE
        $balance=new Balance;
        $balance->userid    =   $req->u_id;
        $balance->balance   =   $req->amount;
        $balance->save();

        //return $account."<br><br>".$transaction."<br><br>".$balance;
        return view('/user/login');
    }
}
