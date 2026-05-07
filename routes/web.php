<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', function () {
    \App::setLocale('id');
    $bride = \App\Models\Partner::where('type', 'bride')->first();
    $groom = \App\Models\Partner::where('type', 'groom')->first();
    $bankAccounts = \App\Models\BankAccount::where('is_active', true)->get();
    $moments = \App\Models\Media::where('category', 'moment-of-together')->get();
    $agendas = \App\Models\Agenda::orderBy('date')->orderBy('start_time', 'asc')->get();
    $mainAgenda = $agendas->where('is_main_agenda', true)->first() ?? $agendas->first();

    return view('welcome', compact('bride', 'groom', 'bankAccounts', 'moments', 'agendas', 'mainAgenda'));
});

Route::post('/rsvp', [RsvpController::class, 'store'])->middleware('throttle:3,1')->name('rsvp.store');
