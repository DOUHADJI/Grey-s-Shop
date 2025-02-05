<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        "sender_name",
        "sender_email",
        "sender_contact",
        "content",
        "is_readed",
        "response",
        "subject"
    ];

    protected $cast = [
        "is_readed" => "boolean"
    ];
}
