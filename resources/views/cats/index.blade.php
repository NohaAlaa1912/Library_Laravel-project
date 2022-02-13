@extends('layout')

@section('title')
    All Categories
@endsection

@section('main')

@if (request()->session()->has('success-msg'))
    <div class="alert alert-success">
        <p>
            {{request()->session()->get('success-msg')}}
        </p>
    </div>

 @endif

<h1>All Categories</h1>
   <a href=" {{ url('/cats/create') }} ">Add Category</a>

   <form action=" {{'/cats/search'}} " method="GET">
       <input type="text" name="keyword" >
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
    
    <img src=" {{asset("uploads/$cat->img")}} " height= 100px >
    
    <p>{{ $cat->desc }}</p>
    <div>
        <a class="btn btn-info" href="{{ url("/cats/edit/$cat->id") }}"> Edit</a>
        <a class="btn btn-danger" href="{{ url("/cats/delete/$cat->id") }}"> Delete</a>
    </div> <br>
    @endforeach
 
    {{ $cats->links() }}
 
@endsection

