<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function create(Request $request)
    {
      $book = new Book ();
      $book->title = $request->title;
      $book->author = $request->author;
      $book->publication_date =$request->publication_date;
      $book->save ();
      return $book;
    }

    public function index()
    {
    $books = Book::all ();
    return $books;
    }

    public function destroy(Book $book)
    {
        //
    }
}
