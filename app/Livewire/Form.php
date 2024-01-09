<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Form extends Component
{
    public $email;
    public $remarks;

    public function sendEmail() {
       $this->validate([
           'email' => 'required|email',
           'remarks' => 'required'
       ]);

       Mail::to('info@solarpanelapps.nl')
        ->send(new \App\Mail\ContactForm($this->email, $this->remarks));

       $this->email = '';
       $this->remarks = '';
       session()->flash('message', 'Bedankt voor uw bericht, we nemen zo snel mogelijk contact met u op!');

    }

    public function render()
    {
        return view('livewire.form');
    }
}
