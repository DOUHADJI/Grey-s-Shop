<?php

namespace App\Livewire;

use App\UseCases\SubscriberUsecase;
use Illuminate\Http\Request;
use Livewire\Component;

class BecomeMemberOnPurchaseComponent extends Component
{
    private $subscriberUseCase;
    public $name;
    public $email;

    protected $rules = [
        'name' => ['nullable', 'string'],
        'email' => ['required', 'email'],
    ];

    public function __construct()
    {
        $this->subscriberUseCase = new SubscriberUsecase();
    }

    public function mount()
    {
        // $this->dispatch("new-subscriber");
    }

    public function submitForm(Request $request)
    {

       $valid =  $this->validate($this->rules);
      // dd($valid);

        $subscriber = $this->subscriberUseCase->storeWithLivewire([
            'name' => $this->name,
            'email' => $this->email,
        ]);
       // dd($subscriber);
        $this->reset(['name', 'email']);
        $this->dispatch("new-subscriber");
    }


    public function render()
    {
        return view('livewire.become-member-on-purchase-component');
    }
}
