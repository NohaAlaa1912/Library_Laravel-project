@extends('layout')

@section('title')
Edit Category
@endsection

@section('main')
    <h1>Edit Category - {{ $cat->name }}</h1>
    
    @include('errors')

    <form action="{{ url("/cats/update/$cat->id") }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label>Name: </label>
        <input type="text" name="name" value="{{ $cat->name }}"> 
        <br><br>
        <label>Desc: </label>
        <textarea name="desc" id="" cols="30" rows="10"> {{ $cat->desc }} </textarea> 
        <br>
        <br>
        <img src="{{ asset("uploads/$cat->img") }} " height="150px">
        <br>
        <br>
        <label>Img: </label>
        <input type="file" name="img">
        <br>
        <br>

        <input type="submit" value="edit">

</form>
@endsection