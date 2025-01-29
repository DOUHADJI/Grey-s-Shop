<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Config extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slogan',
        'email',
        'contact',
        'address',
        'logo',
        'facebook_page_link',
        'youtube_page_link',
        'instagram_page_link',
    ];
}
