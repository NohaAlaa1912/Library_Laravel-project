@extends('layout')

@section('title')
    Register
@endsection

@section('main')
    <h1>Register</h1>

    @include('errors')


    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <label><b>Name:</b></label> <br>
        <input type="text" name="name" placeholder="name"><br>

        <label><b>Email:</b></label><br>
        <input type="email" name="email" placeholder="email"><br>

        <label><b>Password:</b></label><br>
        <input type="password" name="password" placeholder="password"><br>

        <label><b>Confirm Password:</b></label><br>
        <input type="password" name="password_confirmation" placeholder="password confirm"><br>
        
        <br>
        <input type="submit" value="register">
    </form>
@endsection