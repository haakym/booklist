<?php

namespace Tests\Unit\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SortByAttributeLinkTest extends TestCase
{
    /** @test */
    function generate_a_link_to_sort_by_attribute()
    {
        $link = 'books.index';
        $attr = 'author';
        
        $linkWithAttrSort = sort_by_attr_link($link, $attr);
        
        $this->assertEquals('http://booklist.dev/books?sortBy=author&direction=asc', $linkWithAttrSort);
    }
}
