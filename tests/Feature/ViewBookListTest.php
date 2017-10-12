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
    function user_can_view_a_list_of_books_sorted_by_a_given_attribute()
    {
        $bookA = factory(Book::class)->create([
            'title' => 'Alice\'s Adventures in Wonderland',
        ]);

        $bookZ = factory(Book::class)->create([
            'title' => 'Zen',
        ]);

        $responseAsc = $this->get('/books?sortBy=title&direction=asc')->original->getData()['books'];
        $responseDesc = $this->get('/books?sortBy=title&direction=desc')->original->getData()['books'];

        $this->assertEquals($bookA->title, $responseAsc->first()->title);
        $this->assertEquals($bookZ->title, $responseDesc->first()->title);
    }

    /** @test */
    public function user_can_search_for_a_book_by_a_given_attribute()
    {
        $book1 = factory(Book::class)->create([
            'title' => 'Deep Work',
            'author' => 'Cal Newport'
        ]);

        $book2 = factory(Book::class)->create([
            'title' => 'Laravel - Up and Running',
            'author' => 'Matt Stauffer'
        ]);

        $response = $this->get('/books?title=Deep%20Work')
            ->assertSee('Deep Work')
            ->assertSee('Cal Newport')
            ->assertDontSee('Laravel - Up and Running')
            ->assertDontSee('Matt Stauffer');
    }
}
