@extends('layout')

@section('title')
    All Users
@endsection

@section('main')



<h1>All Users</h1>
   
    @foreach ($users as $user)
    <hr>
   <p> {{ $user->name }} - {{ $user->email }} </p>
   <p> Type: {{ $user->role }}</p>
    
    @endforeach
 
   
 
@endsection

