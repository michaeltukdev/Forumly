<?php

use App\Http\Controllers\Panel\PanelController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::view('/', 'welcome')->name('home');

Route::view('/terms', 'pages.public.terms')->name('terms');

Route::view('privacy', 'pages.public.privacy')->name('privacy');

Route::get('/logout', function (Request $request) { Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect('/'); })->name('logout');


// Auth Routes

Route::view('/email/verify', 'email.verification.notice')->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect(route('home'));
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Control panel

Route::group(['middleware' => ['auth', 'can:panel access']], function () {
    Route::get('/panel', [PanelController::class, 'home'])->name('panel');
});
