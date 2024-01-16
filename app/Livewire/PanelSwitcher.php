<?php

namespace App\Livewire;

use App\Mail\DisableSystem;
use App\Models\Panel;
use Illuminate\Support\Facades\Mail;
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

    public function disableSystem() {
            $this->subscription->panels()->update(['status' => 'inactive']);
            session()->flash('message', 'Alle panels zijn uitgezet.');
            Mail::to($this->subscription->customer->email)->send(new DisableSystem());
    }

    public function render()
    {
        return view('livewire.panel-switcher');
    }
}
