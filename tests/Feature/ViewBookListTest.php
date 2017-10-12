<?php

namespace Tests\Feature;

use App\Models\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewBookListTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function user_can_view_a_list_of_books()
    {
        $books = factory(Book::class, 5)->create();
        
        $this->get('/books')
            ->assertSee($books[0]->title)
            ->assertSee($books[0]->author)
            ->assertSee($books[3]->title)
            ->assertSee($books[3]->author);
    }

    /** @test */
    function user_sees_alert_message_when_there_are_no_books()
    {
        $this->get('/books')
            ->assertSee('There are no books added yet! Please add a new book.');
    }

    /** @test */
    function user_can_view_a_list_of_books_sorted_by_title()
    {
        $bookA = factory(Book::class)->create([
            'title' => 'Alice\'s Adventures in Wonderland',
            'author' => 'Lewis Carol',
        ]);

        $bookZ = factory(Book::class)->create([
            'title' => 'Zen',
            'author' => 'Phil Jackson',
        ]);

        $response = $this->get('/books?sortBy=title&direction=asc');

        // see z is first

    }
}
