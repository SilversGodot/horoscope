<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\PersonController;

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

Route::get('/horoscope', [HoroscopeController::class, 'index']);

Route::resource('/person', PersonController::class);

Route::get('/horoscope/list', [HoroscopeController::class, 'getHoroscopeListAjax']);
Route::get('/horoscope/result', [HoroscopeController::class, 'getHoroscopeAjax'])->name('horoscope');
Route::post('/horoscope', [HoroscopeController::class, 'getDate'])->name('submit_date');
