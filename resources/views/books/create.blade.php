@extends('layout')

@section('title')
    Add Book
@endsection

@section('main')
    <h1>Add Book</h1>
    
    @include('errors')
    
    <form method="POST" action="{{ url('/books/store') }}" enctype="multipart/form-data">
        @csrf
        <label><b>Name:</b></label>
        <br>
        <input type="text" name="name">
        <br>

        <label><b>Description:</b></label>
        <br>
        <textarea name="desc" cols="30" rows="10"></textarea>
        <br>
        
        <label><b>Price:</b></label>
        <br>
        <input type="number" name="price">
        <br>

        <label><b>Category:</b></label>
        <br>
        <select name="cat_id">
            @foreach($cats as $cat)                 
                <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
            @endforeach
        </select>
        <br>

        <label><b>Image:</b></label>
        <br>
        <input type="file" name="img">
        <br>

        <br>
        <input type="submit" value="add">
       
    </form>
    @endsection