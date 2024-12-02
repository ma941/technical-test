<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WindFarmController;
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

Route::get('/', DashboardController::class)->name('dashboard');
Route::resource('windfarms', WindFarmController::class)->names('windfarms');

