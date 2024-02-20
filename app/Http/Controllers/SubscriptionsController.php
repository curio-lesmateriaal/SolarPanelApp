<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SolarPanelSystem;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionsController extends Controller
{

    public function index() {
        $subscriptions = Subscription::all();

        return view('subscriptions.index')
            ->with('subscriptions', $subscriptions);
    }

    public function create() {

        return view('subscriptions.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'solar_panel_system_id' => 'required|exists:solar_panel_systems,id',
        ]);

        DB::transaction(function () use ($request) {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'zip' => $request->zip,
                'city' => $request->city,
            ]);

            Subscription::create([
                'solar_panel_system_id' => $request->solar_panel_system_id,
                'customer_id' => $customer->id,
            ]);
        });


        return redirect()->route('subscriptions.index');



        return redirect()->route('subscriptions.index');
    }

    public function show(Subscription $subscription) {
        return view('subscriptions.show', [
            'subscription' => $subscription,
        ]);
    }

}
