@extends('layout')

@section('title')
   Latest {{$num}} Category
@endsection

@section('main')

<h1>Latest {{$num}} Category</h1>
   <a href=" {{ url('/cats') }} ">Back To All</a>

    @foreach ($cats as $cat)
    <hr>
      <!-- <h3> {{ $cat->id }} - {{ $cat->name }}</h3>  or --> 
     <h3>
        <a href=" {{ url("cats/show/$cat->id") }} ">
            {{ $cat->id . " - ". $cat->name }}
        </a>
    </h3>
    <a href="{{ url("/cats/edit/$cat->id") }}"> Edit</a>
    <a href="{{ url("/cats/delete/$cat->id") }}"> Delete</a>

    <p>{{ $cat->desc }}</p>
    @endforeach

@endsection

