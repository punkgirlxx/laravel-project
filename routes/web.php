<?php
/*  KB - 26-01-2025
    apis
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout',[AuthController::class, 'Logout'])->name('logout');

// the user must be signed out for these functions
// all the views are in the auth folder in views
Route::middleware('guest')->controller(AuthController::class)->group(function() {
Route::get('/login', 'showLogin')->name('show.login');
Route::get('/register','showRegister')->name('show.register');
Route::post('/login','Login')->name('login');
Route::post('/register','Register')->name('register');
});

// the user must be signed in for these functions
// all the views are in the dashboard folder in views
Route::middleware('auth')->controller(RecordController::class)->group(function() {
Route::get('/dashboard', 'index')->name('dashboard.index');
Route::get('/dashboard/create','create')->name('dashboard.create');
Route::get('/dashboard/{record}', 'show')->name('dashboard.show');
Route::post('/dashboard', 'store')->name('dashboard.store');
Route::post('/dashboard/{record}', 'update')->name('dashboard.update');
Route::delete('/dashboard/{record}','destroy')->name('dashboard.destroy');
});
