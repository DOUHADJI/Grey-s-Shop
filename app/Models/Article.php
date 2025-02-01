<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{

    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'price',
        'view_count',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes() : HasMany
    {
        return $this->hasMany(ProductLike::class, "product_id");
    }

}
