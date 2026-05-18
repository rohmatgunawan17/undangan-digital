<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\InvitationController;

Route::get('/', function () {
    return view('invitation');
});

Route::get('/create', [ThemeController::class, 'create'])->name('create');

Route::get('/s/{sid}/undangan/{tid}', [InvitationController::class, 'show'])->name('invite.show');
Route::post('/s/{sid}/undangan/{tid}/rsvp', [InvitationController::class, 'rsvp'])->name('invite.rsvp');
