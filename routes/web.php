<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;

Route::get('/', function () {
    return view('invitation');
});

Route::get('/create', [ThemeController::class, 'create'])->name('create');
