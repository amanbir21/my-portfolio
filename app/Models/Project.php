<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Fix the error by adding the array of allowed fields
   protected $fillable = [
    'title',
    'description',
    'image',
    'tags',
    'technology',
    'github_link'
];

    protected $casts = [
    'tags' => 'array'
];
}
