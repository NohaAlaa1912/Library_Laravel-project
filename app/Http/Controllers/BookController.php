<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index() 
    {
    $books = Book::paginate(3);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        // SELECT * FROM CATS WHERE id= '$id' 
        $book = Book::findOrFail($id);

        // dd($cat);
        return view('books.show', [
            'book' => $book
        ]);
    }
    public function create()
    {
        $cats = Cat::select('id', 'name')->get();
    
        return view('books.create', [
            'cats' => $cats
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'desc' =>'required|string',
            'price' =>'required|numeric|max:9999.99',
            'cat_id' =>'required|exists:cats,id',
            'img' =>'required|image|max:1024|mimes:jpg,jpeg,png'
           
        ]);
        // dd($request->img);
        $imgPath = Storage::putFile("books", $request->img);

        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'cat_id' => $request->cat_id,
            'img'  => $imgPath
        ]);
        return redirect(url('books'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $books = Book::where('name', 'like', "%$keyword%")->get();

        return view('books.search', [
            'books' => $books,
            'keyword' => $keyword
        ]);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $cats = Cat::select('id', 'name')->get();

        return view('books.edit', [
            'book' =>$book,
            'cats' =>$cats
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'desc' =>'required|string',
            'price' =>'required|numeric|max:9999.99',
            'cat_id' =>'nullable|exists:cats,id',
            'img' =>'nullable|image|max:1024|mimes:jpg,jpeg,png'
           
        ]);

        $book = Book::findOrFail($id);
        $imgPath = $book->img;

        if ($request->hasFile('img')) {
            Storage::delete($imgPath);
            $imgPath = Storage::putFile("books", $request->img);
        }

        $book->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'cat_id' => $request->cat_id,
            'img'  => $imgPath
        ]);

        return redirect(url('/books'));

    }
    public function delete($id) 
    {
        $book =Book::findOrFail($id);
        Storage::delete($book->img);
        $book->delete();

        return redirect( url('/books') );

    }
}
