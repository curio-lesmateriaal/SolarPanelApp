<?php

namespace App\Livewire;

use App\Models\Panel;
use App\Models\SolarPanelSystem;
use Livewire\Component;

class CreateSubscriptionForm extends Component
{
    public $solarPanelSystems = [];
    public $description = 'Dit is het aanmaakform voor een subcription';
    public $warning = '';
    public $panelCount;
    public $panelInput;


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

        if ($this->panelCount < $this->panelInput) {
            $this->panelInput = $this->panelCount;
        }

        $this->description = 'Je hebt een systeem gekozen: ' . $type .
                            '. Hiervan zijn ' . $this->panelCount . ' panelen voor beschikbaar...';
        $this->warning = 'Panelen beschikbaar: ' . $this->panelCount;
    }

    public function checkMaxPanels() {

        if($this->panelInput < 0) {
            $this->warning = 'Je kan geen negatief aantal panelen kiezen...';
        }

        if ($this->panelCount < $this->panelInput ) {
            $this->warning = 'Er zijn maar ' . $this->panelCount . ' panelen beschikbaar...';
            $this->reset('panelInput');
        }
    }

    public function render()
    {
        return view('livewire.create-subscription-form');
    }
}
