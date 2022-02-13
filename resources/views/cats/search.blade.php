@extends('layout')

@section('title')
   Search Categories for {{$keyword}}
@endsection

@section('main')

<h1> Search Categories for {{$keyword}}</h1>
   <a href=" {{ url('/cats') }} ">Back To All</a>

   <form action=" {{'/cats/search'}} " method="GET">
       <input type="text" name="keyword" value="{{$keyword}}">
       <br>
       <input type="submit" value="search" name="search">
   </form>

    @foreach ($cats as $cat)
    <hr>
      <!-- <h3> {{ $cat->id }} - {{ $cat->name }}</h3>  or --> 
     <h3>
        <a href=" {{ url("cats/show/$cat->id") }} ">
            {{ $cat->id . " - ". $cat->name }}
        </a>
    </h3>
    <img src=" {{asset("uploads/$cat->img")}} " height= 100px ><br>
    
    <p>{{ $cat->desc }}</p>

    <a class="btn btn-info" href="{{ url("/cats/edit/$cat->id") }}"> Edit</a>
    <a class="btn btn-danger" href="{{ url("/cats/delete/$cat->id") }}"> Delete</a>
    
    @endforeach
    
@endsection

