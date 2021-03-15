<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\transferMoneyController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HistoryController;
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
//     return view('welcome');
// });

Route::get('/',function()
{
    return view('user/index');
});
Route::get('/register',function()
{
    return view('user/register');
});
Route::get('/depositAmount',function()
{
    return view('user/depositAmount');
});
Route::get('/login',function()
{
    return view('user/login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get('/registeraccount',function()
{
    return view('user/registeraccount');
});

Route::get('showBalance',function()
{
    return view('user.showBalance');
});

Route::get('/transfermoney',[transferMoneyController::class,'create']);
Route::get('/refreshcaptcha',[transferMoneyController::class,'refreshcaptcha']);
Route::post('/captcha',[transferMoneyController::class,'captchaValidate']);
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/registeraccount',[AccountController::class,'accountInfo']);
Route::post('/deposit',[DepositController::class,'deposit']);
Route::get('/history',[HistoryController::class,'history']);