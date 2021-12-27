<?php

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

Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('/');
Route::	POST('/search', [App\Http\Controllers\GuestController::class, 'search'])->name('search');
Route::get('/search', [App\Http\Controllers\GuestController::class, 'search'])->name('search');
Route::get('/register', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addevent', [App\Http\Controllers\EventController::class, 'create'])->name('addevent');
Route::post('/addevent', [App\Http\Controllers\EventController::class, 'store'])->name('addevent');
Route::post('/invite', [App\Http\Controllers\InviteController::class, 'store'])->name('invite');

