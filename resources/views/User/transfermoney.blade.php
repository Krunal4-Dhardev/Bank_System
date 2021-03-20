
@extends('user.master')
<?php
//if(!Session::has('user'))
{
  //return view('user.login');
}
?>

@section('content')

    <div class="continer">
        @if(session('Error'))
            <h4 style="color:red" class="flash">{{session('Error')}}</h4>
        @endif
        
        <form method="post" action="captcha">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Account Number">Account Number *</label>
                        <input type="text" class="form-control" name="accountNumber" required>
                    </div>
            </div>

            <div class="row"> 
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Ammount">Amount *</label>
                        <input type="text" class="form-control" name="Amount" id="check" onkeyup="disp(this)" required>
                    </div>
            </div>

            <div class="row d-none"  id="pancheck">
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="pancardNumber" id="label">Pan Card Number *</label>
                        <input type="text" class="form-control" name="pancard" id="pancarddisp">
                    </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Description">Description * </label>
                        <input type="text" class="form-control" name="description">
                    </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-success" id="refresh"><span class="glyphicon glyphicon-refresh"></span> </button>
                        </div>
                    </div>
            </div>

           
            <div class="row">
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"></div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
            </div>
        </form>
    </div>
@endsection

