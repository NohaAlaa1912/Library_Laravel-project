@extends('layout')

@section('title')
   Search book for {{$keyword}}
@endsection

@section('main')

<h1> Search book for {{$keyword}}</h1>
   <a href=" {{ url('/books') }} ">Back To All</a>

   <form action=" {{'/books/search'}} " method="GET">
       <input type="text" name="keyword" value="{{$keyword}}">
       <br>
       <input type="submit" value="search" name="search">
   </form>

    @foreach ($books as $book)
    <hr>
      <!-- <h3> {{ $book->id }} - {{ $book->name }}</h3>  or --> 
     <h3>
        <a href=" {{ url("books/show/$book->id") }} ">
            {{ $book->id . " - ". $book->name }}
        </a>
    </h3>
    <a href="{{ url("/books/edit/$book->id") }}"> Edit</a>
    <a href="{{ url("/books/delete/$book->id") }}"> Delete</a>

    <p>{{ $book->desc }}</p>
    @endforeach

@endsection

