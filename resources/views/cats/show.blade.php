@extends('layout')

@section('title')
Show Category - {{ $cat->name }}
@endsection

@section('main')

    <h1>Show Category - {{ $cat->name }}</h1>
    <hr>
    <h3> {{ $cat->id }} - {{ $cat->name }}</h3>
    <img src=" {{asset("uploads/$cat->img")}} " height= 100px ><br>
    <p>{{ $cat->desc }}</p>
    <small>Createrd at : {{ $cat->created_at }} </small>
    
    <h5> Books: </h5>
    <ul>
        @foreach ($cat->books as $book)
            <li><a href="{{ url("/books/show/$book->id") }}">{{$book->name}}</a></li>
        @endforeach    
    </ul>
    
    <a class="btn btn-dark" href=" {{ url('/cats') }} ">Back</a>


    
@endsection