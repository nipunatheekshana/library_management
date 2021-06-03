@extends('app')
@section('title','Profile')
@section('content')



<div class="uk-card uk-card-default uk-card-body uk-width-3-4@m uk-align-center">
    <div class="profile_box">
        <img class="uk-align-center uk-padding" src="{{asset('img/user.png')}}">
        <h2 class="role uk-align-center">{{$user->role}}</h2>
    </div>
    <h2 >{{$user->first_name}} {{$user->last_name}}</h2>
    <h3>email : {{$user->email}}</h3>
    <h3>Mobile number : {{$user->mobile}}</h3>
    <h3>Gender : {{$user->gender}}</h3>
    <form class="uk-align-center" action="">
        <button type="submit" class=" uk-align-center uk-text-small uk-text-bold  btn"> Edit Details</button>

    </form>



</div>


@endsection
