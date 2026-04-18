<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', function () {
    $bride = \App\Models\Partner::where('type', 'bride')->first();
    $groom = \App\Models\Partner::where('type', 'groom')->first();
    $bankAccounts = \App\Models\BankAccount::where('is_active', true)->get();
    $moments = \App\Models\Media::where('category', 'moment-of-together')->get();

    return view('welcome', compact('bride', 'groom', 'bankAccounts', 'moments'));
});

Route::post('/rsvp', [RsvpController::class, 'store'])->middleware('throttle:3,1')->name('rsvp.store');
