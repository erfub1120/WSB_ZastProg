<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'year',
        'category',
        'description',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'is_available' => 'boolean',
        ];
    }
}
