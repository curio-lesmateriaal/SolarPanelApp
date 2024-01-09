<?php

use App\Http\Controllers\SubscriptionsController;
use App\Models\Subscription;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get("/subscriptions", [SubscriptionsController::class, 'index'])
        ->name('subscriptions.index');

Route::get('/subscriptions/{subscription}', [SubscriptionsController::class, 'show'])
        ->name('subscriptions.show');
