<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', "image"];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
