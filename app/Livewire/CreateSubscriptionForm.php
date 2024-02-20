<?php

namespace App\Livewire;

use App\Models\Panel;
use App\Models\SolarPanelSystem;
use Livewire\Component;

class CreateSubscriptionForm extends Component
{
    public $solarPanelSystems = [];
    public $description = 'Dit is het aanmaakform voor een subcription';
    public $panelCount;


    public function mount() {
        $this->solarPanelSystems = SolarPanelSystem::all();
    }

    public function click() {
        $this->description = 'Je hebt op een field geklikt!!';
    }

    public function changeSystem($type) {
        $this->panelCount = Panel::where('solar_panel_system_id', $type)
        ->whereNull('subscription_id')
        ->count();

        $this->description = 'Je hebt een systeem gekozen: ' . $type .
                            '. Hiervan zijn ' . $this->panelCount . ' panelen voor beschikbaar...';
    }

    public function render()
    {
        return view('livewire.create-subscription-form');
    }
}
