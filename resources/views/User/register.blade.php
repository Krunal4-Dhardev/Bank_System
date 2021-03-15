@extends('user.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form action="register" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="FirstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" name="fname" placeholder="Your First Name">
                        </div>
                        <div class="mb-3">
                            <label for="Lastname" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" name="lname" placeholder="Your Last Name">
                        </div>
                        <div class="mb-3">
                            <label for="mobileNumber" class="form-label">Mobile Number *</label>
                            <input type="text" class="form-control" name="number" placeholder="Your Number">
                        </div>

                        <div class="mb-3">
                            <label for="Email" class="form-label">Email address *</label>
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password *</label>
                            <input type="password" name="pwd" class="form-control"  placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="Conform Password" class="form-label">Conform Password *</label>
                            <input type="password" class="form-control" name="cpwd"  placeholder="Confrom Password">
                        </div>
                        <div class="mb-3">
                            <label for="Date" class="form-label">Date Of Birth *</label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender *</label><br>
                            <input type="radio" name="gen" value="Male" class="raio-control"> Male &nbsp;&nbsp;
                            <input type="radio" name="gen" value="Female" class="raio-control"> Female &nbsp;&nbsp;
                            <input type="radio" name="gen" value="Other" class="raio-control"> Other &nbsp;&nbsp;
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State *</label>
                            <input type="text" class="form-control" name="state" placeholder="State">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City *</label>
                            <input type="text" class="form-control" name="city" placeholder="Your City Name">
                        </div>
                        <div class="mb-3">
                            <label for="Address" class="form-label">Address *</label>
                            <textarea class="form-control" name="address"  placeholder="Your Address " manlength="200" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="PinCode" class="form-label">Pin Code *</label>
                            <input type="text" class="form-control" name="pin" placeholder="Pin Code Number">
                        </div>
                        
                        <div class="mb-3">  
                        <button type="submit" class="btn btn-primary">Continue</button>
                            <!-- <input type="submit" class="btn-success btn" name="continue" value="Continue"> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection