<?php

namespace App\Livewire;

use App\Models\SolarPanelSystem;
use Livewire\Component;

class Testje extends Component
{
    public $title = 'Testje!';
    public $systems;

    public function mount() {
        $this->systems = SolarPanelSystem::all();
    }


    public function changeTitle() {
        $this->title = 'Changed!';
    }

    public function render()
    {
        return view('livewire.testje');
    }
}
