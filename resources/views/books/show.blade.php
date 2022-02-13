@extends('layout')

@section('title')
Show Book - {{ $book->name }}
@endsection

@section('main')

    <h1>Show Book - {{ $book->name }}</h1>
    <hr>
    <h3> {{ $book->id }} - {{ $book->name }}</h3>
    <h5>Category: <a href="{{ url("/cats/show/" . $book->cat->id) }}">{{ $book->cat->name }} </a></h5>
    <p>{{ $book->desc }}</p>
    <p>{{ $book->price }}</p>

    <small>Createrd at : {{ $book->created_at }} </small>

    <a href=" {{ url('/books') }} ">Back</a>


    
@endsection