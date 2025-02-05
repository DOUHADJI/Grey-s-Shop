<?php

namespace App\UseCases;

use Illuminate\Support\Facades\Notification;
use App\Notifications\MessageResponseNotification;

class MessageUseCase{


    public static function sendMailResponse(string $mailAddress, string $response, string $title ) : bool
    {
        Notification::route("mail", $mailAddress)
        ->notify( new MessageResponseNotification($response, $title));

        return true;

    }
}
