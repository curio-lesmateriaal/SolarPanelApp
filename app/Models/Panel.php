<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subscription() {
        return $this->belongsTo(Subscription::class);
    }

    public function solarPanelSystem() {
        return $this->belongsTo(SolarPanelSystem::class);
    }
}
