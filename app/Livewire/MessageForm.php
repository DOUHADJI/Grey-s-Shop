<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class MessageForm extends Component
{
    public $name;
    public $email;
    public $contact;
    public $content;
    public $subject;

    protected $rules = [
        "name" => ["required", "string"],
        "subject" => ["required", "string"],
        "email" => ["required", "email"],
        "contact" => ["nullable"],
        "content" => ["required", "string"]

    ];

    public function submitForm()
    {
       // dd($this->rules);

        $validated = $this->validate($this->rules);

       // dd($validated);

        $messageModel = new Message();
        $messageModel->sender_email = $this->email;
        $messageModel->sender_name = $this->name;
        $messageModel->subject = $this->subject;
        $messageModel->sender_contact = $this->contact;
        $messageModel->content = $this->content;
        $messageModel->is_readed = false;
        $messageModel->save();

        $this->reset(["name", "email", "contact", "content", "subject"]);
        $this->dispatch("message-send");
    }


    public function render()
    {
        return view('livewire.message-form');
    }
}
