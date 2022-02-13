@extends('layout')

@section('title')
    Login
@endsection

@section('main')
    <h1>Login</h1>

    @include('errors')

    @if (request()->session()->has('error-msg'))
        <div class="alert alert-danger">
            <p>{{ request()->session()->get('error-msg') }} </p>
        </div>
    @endif
    
    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <input type="email" name="email">
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit" value="login">
    </form>
@endsection

