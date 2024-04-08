<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::view('/', 'welcome')->name('home');

Route::view('terms', 'pages.public.terms')
    ->name('terms');

Route::view('privacy', 'pages.public.privacy')
    ->name('privacy');

Route::get('/logout', function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();
    return redirect('/');
})->name('logout');
