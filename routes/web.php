<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LanguageController::class, 'index']);

Route::get('/settings', [LanguageController::class, 'settings']);

Route::get('/translate', [LanguageController::class, 'translate']);
