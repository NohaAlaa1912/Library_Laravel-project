<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(2);


        return BookResource::collection($books);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return response()->json([
                'msg' => '404 not found'
            ], 404);
        }
        
        return new BookResource($book);
    }
}
