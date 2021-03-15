@extends('user.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form action="login" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="EmailId" class="form-label">Email Id  *</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email Id">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Your Password ">
                        </div>
                        <div class="mb-3">  
                        <input type="reset" class="btn btn-secondary" value="Reset">
                        <button type="submit" class="btn btn-primary">Continue</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
