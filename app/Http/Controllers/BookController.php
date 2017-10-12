<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        if (request('sortBy')) {
            $books = Book::orderBy(request('sortBy'), request('direction'))->paginate(10);

            return view('books/index')->with(compact('books'));
        }

        $books = Book::paginate(10);

        return view('books/index')->with('books', $books);
    }

    public function store()
    {
    	request()->validate([
    		'title' => 'required|between:3,255',
    		'author' => 'required|between:3,255',
    	]);

    	Book::create([
    		'title' => request('title'),
    		'author' => request('author'),
    	]);

    	return back()->with([
    		'status' => 'success',
    		'message' => 'New book added successfully!',
    	]);
    }

    public function destroy(Book $book)
    {
    	$book->delete();

    	return back()->with([
    		'status' => 'success',
    		'message' => 'Book has been successfully removed!',
    	]);
    }
}
