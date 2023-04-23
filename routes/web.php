<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add/sliders', [App\Http\Controllers\HomeController::class, 'getAddSliders'])->name('getAddSliders');
Route::post('/add/sliders', [App\Http\Controllers\HomeController::class, 'postAddSliders'])->name('postAddSliders');

Route::get('/delete/slider/{slider}', [App\Http\Controllers\HomeController::class, 'getDeleteSlider'])->name('getDeleteSlider');

Route::get('/edit/slider/{slider}', [App\Http\Controllers\HomeController::class, 'getEditSlider'])->name('getEditSlider');
Route::post('/edit/slider/{slider}', [App\Http\Controllers\HomeController::class, 'postEditSlider'])->name('postEditSlider');
