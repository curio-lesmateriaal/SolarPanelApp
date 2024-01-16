<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function redirector() {
        if (auth()->user()) {
            return Self::customer();
        }
    }

    public function admin() {

    }

    public function customer() {
        dd('test');
        return view('dashboard.customer');
    }
}
