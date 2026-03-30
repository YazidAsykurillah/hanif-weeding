<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', function () {
    $bride = \App\Models\Partner::where('type', 'bride')->first();
    $groom = \App\Models\Partner::where('type', 'groom')->first();

    return view('welcome', compact('bride', 'groom'));
});

Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
