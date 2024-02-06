<?php

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('subscriptions/{subscription}', function(Subscription $subscription) {
    return $subscription->with('panels')->get();
});

Route::get('subscriptions', function() {

    $data = [];

    foreach(Subscription::all() as $subscription) {
        array_push($data, [
            'customer_name' => $subscription->customer->name,
            'customer_email' => $subscription->customer->email,
            'customer_address' => $subscription->customer->address,
            'customer_city' => $subscription->customer->city,
            'solar_panel_system_name' => $subscription->solarPanelSystem->name,
            'number_of_panels' => $subscription->panels->count(),
        ]);
    }
    return $data;
});
