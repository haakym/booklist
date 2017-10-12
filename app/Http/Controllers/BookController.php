<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $filters = $this->getFilters(request());

        $filteredBooks = Book::applyFilters($filters);

        return view('books/index')->with($filteredBooks);
    }

    private function getFilters($request)
    {
        return collect($request->validate([
            'title' => 'string|nullable',
            'author' => 'string|nullable',
            'sortBy' => 'in:title,author',
            'direction' => 'in:asc,desc',
        ]))->filter();
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
