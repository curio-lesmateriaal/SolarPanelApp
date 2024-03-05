<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function solarPanelSystem() {
        return $this->belongsTo(SolarPanelSystem::class);
    }

    public function activePanels() {
        return $this->panels()->where('status', 'active')->count();
    }

    public function panels() {
        return $this->hasMany(Panel::class);
    }
}
