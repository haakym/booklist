<?php

namespace Tests\Feature;

use App\Models\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageBookListTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function user_can_add_a_new_book()
    {
        $book = factory(Book::class)->make();

        $this->assertDatabaseMissing('books', [
            'title' => $book->title,
            'author' => $book->author,
        ]);

        $this->post('/books', $book->toArray())
            ->assertSessionHas('status', 'success')
            ->assertSessionHas('message', 'New book added successfully!');

        $this->assertDatabaseHas('books', [
            'title' => $book->title,
            'author' => $book->author,
        ]);
    }

    /** @test */
    function user_can_delete_a_book()
    {
        $book = factory(Book::class)->create();

        $this->delete("/books/{$book->id}", ['id' => $book->id])
            ->assertSessionHas('status', 'success')
            ->assertSessionHas('message', 'Book has been successfully removed!');

        $this->assertDatabaseMissing('books', [
            'title' => $book->title,
            'author' => $book->author,
        ]);
    }

}
