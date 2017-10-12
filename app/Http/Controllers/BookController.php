<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }


    public function index()
    {
        $requestData = collect(request()->validate([
            'title' => 'string|nullable',
            'author' => 'string|nullable',
            'sortBy' => 'in:title,author',
            'direction' => 'in:asc,desc',
        ]))->filter();

        $append = [];

        $books = $this->book;
        
        foreach ($requestData as $key => $value) {
           if (in_array($key, ['title', 'author'])) {
                $books = $books->where($key, 'like', "%{$value}%");
            } else if ($key === 'sortBy' && !empty($value) && !empty($requestData['direction'])) {
                $books = $books->orderBy($value, $requestData['direction']);
            }

            $append[$key] = $value; 
        }

        $books = $books->paginate(10);

        return view('books/index')->with(['books' => $books, 'append' => $append]);
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
