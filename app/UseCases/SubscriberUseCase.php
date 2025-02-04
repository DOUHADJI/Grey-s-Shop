<?php

namespace App\UseCases;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Notifications\NewSubscriptionNotification;

class SubscriberUsecase{


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ["nullable"],
            'email' => ["required", "email", "unique:subscribers,email"],
        ]);


        $subscriber = new Subscriber();
        $subscriber->email = $validatedData['email'];
        $subscriber->name = $validatedData['name'];
        $subscriber->save();

        $subscriber->notify(new NewSubscriptionNotification());

        return $subscriber;
    }

    public function storeWithLivewire(Array $data)
    {
        $validatedData = validator($data, [
            'name' => ['nullable', 'string'],
            'email' => ['required', 'email', 'unique:subscribers,email'],
        ])->validate();

        $subscriber = new Subscriber();
        $subscriber->email = $validatedData['email'];
        $subscriber->name = $validatedData['name'];
        $subscriber->save();

        $subscriber->notify(new NewSubscriptionNotification());

        return $subscriber;
    }

}
