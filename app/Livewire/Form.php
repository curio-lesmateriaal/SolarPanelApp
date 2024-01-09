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
            'remarks' => 'required|min:10'
        ]);

        // Send email
        Mail::to($this->email)->send(new \App\Mail\Remarks($this->remarks));

        // success message
        session()->flash('message', 'Je bericht is verzonden!');

        $this->email = '';
        $this->remarks = '';
    }

    public function render()
    {
        return view('livewire.form');
    }
}
