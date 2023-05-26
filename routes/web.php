<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Components\SplashScreen;
use App\Http\Livewire\Components\HomeScreen;
use App\Http\Livewire\Components\InterestScreen;
use App\Http\Livewire\Components\PreferenceScreen;
use App\Http\Livewire\Components\FeedScreen;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\GoogleController;

Route::get('/', SplashScreen::class)->name('splash-screen');
Route::get('/home', HomeScreen::class)->name('home');

// Auth
Route::group(['middleware' => 'auth'], function () {
    Route::get('/interests', InterestScreen::class)->name('interests');
    Route::get('/preferences', PreferenceScreen::class)->name('preferences');
    Route::get('/feed', FeedScreen::class)->name('feed');
});

// GitHub authentication
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/github', GithubController::class);

// Google authentication
Route::get('/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/google', GoogleController::class);