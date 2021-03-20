@extends('user.master')

@section('content')


<div class="continer">
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Your Account</th>
        <th scope="col">To Account</th>
        <th scope="col">Amount</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
        <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($result as $item)
                  
        <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{session::get('user')['Fname']}}&nbsp;{{session::get('user')['Lname']}}</td>
            <?php $user2=DB::table('users')->where(['id'=>$item['touserid']])->first();?>
            @if($user2) 
                <td>{{$user2->Fname}} &nbsp;{{ $user2->Lname }}</td>
            @else
                <td>Bank</td>
            @endif

            <td>{{$item['amount']}}</td>
            <td>{{$item['Description']}}</td>
            <td>{{$item['Type']}}</td>
            <td>{{$item['updated_at']}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection