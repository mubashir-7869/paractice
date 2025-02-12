<?php

use App\Http\Controllers\SportsController;
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

Auth::routes();

Route::get('/', [SportsController::class, 'create'])->name('create');
Route::post('/sports', [SportsController::class, 'store'])->name('store');
Route::get('/sports/show', [SportsController::class, 'show'])->name('show');
