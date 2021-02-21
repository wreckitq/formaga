<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\KitchenSink\Buttons;
use App\Http\Livewire\KitchenSink\Cards;
use App\Http\Livewire\KitchenSink\Charts;
use App\Http\Livewire\KitchenSink\Forms;
use App\Http\Livewire\KitchenSink\Modals;
use App\Http\Livewire\KitchenSink\Tables;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::prefix('kitchen-sink')->name('kitchen-sink.')->group(function () {
        Route::get('forms', Forms::class)->name('forms');
        Route::get('tables', Tables::class)->name('tables');
        Route::get('cards', Cards::class)->name('cards');
        Route::get('charts', Charts::class)->name('charts');
        Route::get('buttons', Buttons::class)->name('buttons');
        Route::get('modals', Modals::class)->name('modals');
    });
});
