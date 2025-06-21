<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Bosh sahifa / - events.index sahifasiga yo‘naltiriladi
Route::get('/', [EventController::class, 'index'])->name('events.index');

// Eventlar uchun barcha RESTful marshrutlar
Route::resource('events', EventController::class)->except(['index']);
