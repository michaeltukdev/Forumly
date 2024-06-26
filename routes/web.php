<?php

use Illuminate\Http\Request;
use App\Livewire\Pages\Public\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\PanelController;
use App\Livewire\Pages\Public\CreateThread;
use App\Livewire\Pages\Public\Forums;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', Home::class)->name('home');

Route::view('/terms', 'pages.public.terms')->name('terms');

Route::view('privacy', 'pages.public.privacy')->name('privacy');

Route::get('/forums/{slug}', Forums::class)->name('forums');

Route::group(['middleware' => 'auth', 'can: create threads'], function () {
    Route::get('/forums/{slug}/create-thread', CreateThread::class)->name('forums.create-thread');
});





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

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    session()->flash('alert', ['type' => 'success', 'message' => 'See you soon! You have been logged out!']);
    return redirect('/');
})->name('logout');


// Control panel

Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'can:panel access']], function () {
    Route::get('/', [PanelController::class, 'home'])->name('panel');
    Route::get('/users', [PanelController::class, 'users'])->name('panel.users');

    Route::group(['prefix' => 'forums/categories', 'middleware' => ['can:manage forum categories']], function () {
        Route::get('/', [PanelController::class, 'forumCategories'])->name('panel.forums.categories');
        Route::get('/create', [PanelController::class, 'forumCategoriesCreate'])->name('panel.forums.categories.create');
        Route::get('/edit/{category}', [PanelController::class, 'forumCategoriesEdit'])->name('panel.forums.categories.edit');
    });

    Route::group(['prefix' => 'forums/', 'middleware' => ['can:manage forum categories']], function () {
        Route::get('/', [PanelController::class, 'forums'])->name('panel.forums');
        Route::get('/create', [PanelController::class, 'forumsCreate'])->name('panel.forums.create');
        Route::get('/edit/{forums}', [PanelController::class, 'forumsEdit'])->name('panel.forums.edit');
    });
});
