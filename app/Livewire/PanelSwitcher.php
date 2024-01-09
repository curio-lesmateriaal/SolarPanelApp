<?php

namespace App\Livewire;

use App\Models\Panel;
use Livewire\Component;

class PanelSwitcher extends Component
{
    public $subscription;

    public function togglePanel($panelId) {

        $panel = Panel::find($panelId);
        $panel->status = $panel->status == 'active' ? 'inactive' : 'active';
        $panel->save();
        session()->flash('message', "Panel #$panel->id op $panel->status gezet.");

    }

    public function render()
    {
        return view('livewire.panel-switcher');
    }
}
