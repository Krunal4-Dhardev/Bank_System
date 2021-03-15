<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\user;
use App\Models\Balance;
use App\Models\Transaction;
use Validator;
use Session;

class transferMoneyController extends Controller
{
    public function create()
    {
        return view('user/transfermoney');
    }

    public function captchaValidate(Request $request)
    {
        $rule=array(
            "accountNumber"=>"required",
            "Amount"=>"required",
            "captcha"=>"required"
        );
        
        //CHECK CAPTCHA CODE IS VALID OR NOT
        $validator=Validator::make($request->all(),$rule);
        
        //IF NOT VALID RETURN AGAIN TRANSFTER MONEY PAGE
        if($validator->fails())
        {
            return view('user/transfermoney',['Result'=>"Invallid aptcha Code Please Try Again"]);
        }
        else
        {
            //GET THE ACCOUNT NUMBER AN FIND WHO'S ACCOUNT IS
            $account=Account::where(['Account_no'=>$request->accountNumber])->first();

           
            if($account)
            {
                //GET DETAIAIL WHO IS DOING THIS TRANSACTION 
                $userAccount=user::where(['email'=>session::get('user')['email']])->first();

                //Chacking Balance Is availabe or not 
                $balance=Balance::where(['userid'=>$userAccount['id']])->first();
                
                //CHECK BALANCE IS AVAILABLE OR NOT 
                if($request->Amount > $balance['Balance'])
                {
                    return "Sorry Not Sufficient Balance For this transaction ";
                }
                else{
                    //MAKE TRANSACTION HISTORY FOR WHO SENDING MONEY
                    $transaction = new Transaction;
                    $transaction->userid         = session::get('user')['id'];
                    $transaction->touserid       = $account['id'];
                    $transaction->amount         = $request->Amount;
                    $transaction->Description    = $request->description;
                    $transaction->Type           = 'DEBIT';
                    $transaction->status         = true;
                    $transaction->save();


                    //MAKE TRANSACTION HISTORY FOR RECEIVER WHO RESIVE MONEY
                    $transaction = new Transaction;
                    $transaction->userid         = $account['id']; 
                    $transaction->touserid       = session::get('user')['id'];
                    $transaction->amount         = $request->Amount;
                    $transaction->Description    = $request->description;
                    $transaction->Type           = 'CREDIT';
                    $transaction->status         = true;
                    $transaction->save();

                    
                    // GET CURRENT ACCOUNT BALANCE
                    $balance = Balance::where(['userid'=>$userAccount['id']])->first();     

                    if($balance)
                    {
                        // DEDUCTION REQUESTED AMOUNT
                        $balance->Balance = ($balance->Balance - $request->Amount);
                        $balance->save();

                        //CREDIT REQUESTED AMOUNT  
                        $checkbalance = Balance::where(['userid'=>$account['id']])->first();
                        if($checkbalance)
                        {
                             
                            $checkbalance->Balance = ($checkbalance->Balance + $request->Amount);
                            $checkbalance->save();
                            return redirect('/');
                        }
                        else
                        {
                            //RETURN FASE IF TRANSACTION AMOUNT WILL NOT CREDIT OR USER INFORMATION WILL NOT FIND
                            return "Somthing Wrong";
                        }

                    }
                    else
                    {
                        //IF USER DATA WILL NOT FIND THEN TRANSACTION WILL FAIELD
                        $transaction=Transaction;
                        return "Somthing Wrong in This Trantions";
                    }
                }
            }
            else
            {
                //RETURN IF USER ACCOUNT NUMBER IS WRONG 
                return "There is somthing is wrong in account number please check agian ";
            }	
            
        }
        
        
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=>captcha_img()]);
    }
    
   
}
