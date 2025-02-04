<?php

namespace App\Livewire;

use App\UseCases\SubscriberUsecase;
use Livewire\Component;

class SubscribeNewsletterComponent extends Component
{
    private $subscriberUseCase;
    public $email;

    protected $rules = [
        'email' => ['required', 'email', "unique:subscribers,email"],
    ];

    public function __construct()
    {
        $this->subscriberUseCase = new SubscriberUsecase();
    }

    public function submitForm()
    {
       $valid =  $this->validate($this->rules);
        dd($valid);
        $subscriber = $this->subscriberUseCase->storeWithLivewire([
            'email' => $this->email,
            'name'=> null
        ]);
        $this->reset(['email']);
        $this->dispatch("new-subscriber");
    }


    public function render()
    {
        return view('livewire.subscribe-newsletter-component');
    }
}
