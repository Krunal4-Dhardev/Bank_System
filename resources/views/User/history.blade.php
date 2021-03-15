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
        
        @foreach($result,$user,$user2 as $item)
   
        <tr>
        <th scope="row"></th>
        <td>{{$item['Fname']}}     {{$item['Lname']}}</td>
        <td></td>
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