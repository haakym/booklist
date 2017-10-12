<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public static function applyFilters($filters)
    {
        $books = new self;

    	$append = [];

    	$searchFields = ['title', 'author'];
        
        foreach ($filters as $key => $value) {
           if (in_array($key, $searchFields)) {
                $books = $books->where($key, 'like', "%{$value}%");
            }

            $append[$key] = $value; 
        }

        if (!empty($filters['sortBy']) && !empty($filters['direction'])) {
            $books = $books->orderBy($filters['sortBy'], $filters['direction']);
        }

        return [
	        'books' => $books->paginate(10),
	        'append' => $append
        ];
    }
}
