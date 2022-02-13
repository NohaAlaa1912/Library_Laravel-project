@extends('layout')

@section('title')
Edit bookegory
@endsection

@section('main')
    <h1>Edit bookegory - {{ $book->name }}</h1>
    
    @include('errors')

    <form action="{{ url("/books/update/$book->id") }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label><b>Name: </b></label>
        <br>
        <input type="text" name="name" value="{{ $book->name }}"> 
        <br><br>
        <label><b>Describtion: </b></label>
        <br>
        <textarea name="desc" id="" cols="30" rows="10"> {{ $book->desc }} </textarea> 
        <br>
        <br>
        <img src="{{ asset("uploads/$book->img") }} " height="150px">
        <br><br>
        <label><b>Image:</b></label>
        <br>
        <input type="file" name="img">
        <br><br>
        <label><b>Price:</b></label>
        <br>
        <input type="number" name="price" value="{{$book->price}}">
        <br>

        <label><b>Category:</b></label>
        <br>
        <select name="cat_id">
            @foreach($cats as $cat)                 
                <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
            @endforeach
        </select>
        <br>

       

        <br>
        <input type="submit" value="edit">

</form>
@endsection