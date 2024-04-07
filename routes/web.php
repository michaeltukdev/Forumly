<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('terms', 'pages.public.terms')
    ->name('terms');

Route::view('privacy', 'pages.public.privacy')
    ->name('privacy');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
