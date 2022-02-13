@extends('layout')

@section('title')
    Add Category
@endsection

@section('main')
    <h1>Add Category</h1>
    
    @include('errors')
    
    <form method="POST" action="{{ url('/cats/store') }}" enctype="multipart/form-data">
        @csrf
 
        <input type="text" name="name">
        <br>
        <textarea name="desc" cols="30" rows="10"></textarea>
        <br>
        <input type="file" name="img">
        <br>
        <input type="submit" value="add">
       
    </form>
    @endsection