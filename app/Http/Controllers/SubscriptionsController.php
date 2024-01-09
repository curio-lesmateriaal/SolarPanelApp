<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{

    public function index() {
        $subscriptions = Subscription::all();

        return view('subscriptions.index')
            ->with('subscriptions', $subscriptions);
    }

    public function show(Subscription $subscription) {
        return view('subscriptions.show', [
            'subscription' => $subscription,
        ]);
    }

}
