@extends('user.master')
@section('content')

<div class="show">
            @foreach($Balance as $bal)
                Your Current Balance is :-> {{$bal['Balance']}}
            @endforeach
       
<div>
@endsection