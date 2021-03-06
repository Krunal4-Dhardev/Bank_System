<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\user;
use App\Models\Balance;
use App\Models\Transaction;
use Session;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    function history()
    {
        $transaction=DB::table('transactions')->where(['userid'=>session::get('user')['id']])->get();
       

        $result = json_decode($transaction, true);
       
        $user=DB::table('users')->where(['id'=>$result[0]['userid']])->get();
       
            // return $user2;
    //    $data=[
    //        'transaction'=>$result,
    //        'user'=>$user,
    //        'user2'=>$user2
    //    ];
       // return $data['transaction'];
        return view('user.history',['result'=>$result]);
    }
}
