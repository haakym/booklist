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
        
        // apply function on link, pass in attr
        $linkWithAttrSort = sort_by_attr_link($link, $attr);
        
        // assert it returns the correct value
        $this->assertEquals('http://booklist.dev/books?sortBy=author&direction=asc', $linkWithAttrSort);
    }
}
