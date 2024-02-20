<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionsController;
use App\Models\Panel;
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

Route::get('/dashboard', function () {
    // haal het |aantal| klanten op
    $customerCount = \App\Models\Customer::count();

    // haal actieve panelen op
    $panelCount = Panel::whereNotNull('subscription_id')->count();
    $subscriptionCount = Subscription::count();
    return view('dashboard', [
        'customerCount' => $customerCount,
        'panelCount' => $panelCount,
        'subscriptionCount' => $subscriptionCount
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get("/subscriptions", [SubscriptionsController::class, 'index'])
            ->name('subscriptions.index');

    Route::post('/subscriptions', [SubscriptionsController::class, 'store'])
            ->name('subscriptions.store');

    Route::get("/subscriptions/create", [SubscriptionsController::class, 'create'])
        ->name('subscriptions.create');

    Route::get('/subscriptions/{subscription}', [SubscriptionsController::class, 'show'])
            ->name('subscriptions.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
