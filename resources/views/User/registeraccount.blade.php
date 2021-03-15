@extends('user.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form action="registeraccount" method="post">
                        @csrf
                        <div class="mb-3">
                            @foreach ($user_id as $item)
        
                            <input type="hidden"  name="u_id" value="{{$item['id']}}">
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="account" class="form-label">Account Number </label>
                            <input type="text" class="form-control" name="account_no" value="{{$account_no}}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label for="pin" class="form-label">PIN Number </label>
                            <input type="text" class="form-control" name="pin_number" value="{{$pin_no}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Deposit Amount *</label>
                            <input type="text" class="form-control" name="amount" id="deposit" onfocusout="despositcheck(this)"   required>
                        </div>
                        <div class="mb-3">
                            <label for="pancard" class="form-label">Pan Card Number *</label>
                            <input type="text" class="form-control" name="pan_number" placeholder="Your Pan Card Number ">
                        </div>

                        <div class="mb-3">
                            <label for="Aadhar" class="form-label">Aadhar Card Number *</label>
                            <input type="text" class="form-control" name="Aadhar_no" id="exampleFormControlInput1" placeholder="Your Aahar Card Number ">
                        </div>
                        <div class="mb-3">
                            <label for="Income" class="form-label">Income *</label><br>
                            <select name="income" class="" required>
                                <option> --- Select Income  ---  </option>
                                <option value="150000">< 1,50,000</option>
                                <option value="250000">< 2,50,000</option>
                                <option value="550000">< 5,00,000</option>
                                <option value="1000000">< 10,00,000</option>
                                <option value="1100000">> 1100000</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Occupation" class="form-label">Occupation  *</label><br>
                            <select class="" name="occu" required>
                                <option> --- Select Occupation  ---  </option>
                                <option value="Job">Job</option>
                                <option value="Business">Bussiness</option>
                                <option value="Student">Student</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="account_type" class="form-label">Account Type *</label><br>
                            <select name="account_type" class="" required>
                                <option> --- Select Account Type  ---  </option>
                                <option value="Saving">Saving Account</option>
                                <option value="Current">Current Account</option>
                                <option value="Fixed Deposit">Fixed Deposit Account</option>
                                <option value="Recurring Deposit">Recurring Deposit Account</option>
                            </select>
                        </div>

                        
                        <div class="mb-3" >  
                        <input type="reset" class="btn btn-secondary" value="Reset" /> &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection