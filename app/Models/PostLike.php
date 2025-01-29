<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }
}
