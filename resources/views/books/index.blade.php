@extends('layout')

@section('title')
    All Books
@endsection

@section('main')

<h1>All Books</h1>
   <a href=" {{ url('/books/create') }} ">Add Book</a>

   <form action=" {{'/books/search'}} " method="GET">
       <input type="text" name="keyword" >
       <br>
       <input type="submit" value="search" name="search">
   </form>

    @foreach ($books as $book)
    <hr>

     <h3>
        <a href=" {{ url("books/show/$book->id") }} ">
            {{ $book->id . " - ". $book->name }}
        </a>
    </h3>
    <div>
        <a href="{{ url("/books/edit/$book->id") }}"> Edit</a>
        <a href="{{ url("/books/delete/$book->id") }}"> Delete</a>
    </div>
    
    <img src=" {{asset("uploads/$book->img")}} " height= 100px >

        <p>{{ $book->desc }}</p>
        <p>price : {{ $book->price }}</p>

    @endforeach
 
    {{ $books->links() }}
 
@endsection

