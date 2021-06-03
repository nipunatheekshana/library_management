@extends('loginlayout')
@section('title','Login')
@section('content')
<div class="left">
    <div class="loginCard">

        <h2>login</h2>
        <form action="/loging_in" method="POST">
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input type="text" class="login" name="id" placeholder="Campus ID No"><br>
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input type="password" class="login" name="password" placeholder="password">
            </div>

            <button type="submit">Login</button>
            <div class="checkbox">
                <input type="checkbox" name="remember">
                <label for="remember" >Remember me</label>
            </div>
            <div class="forgot_password">
                <a href="">Forgot password</a>
            </div>
            @csrf
        </form>


    </div>
</div>
<div class="right">
    <!-- <img src="img/loging bg.jpg" alt=""> -->
</div>


@endsection
