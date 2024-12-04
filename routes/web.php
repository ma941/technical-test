<?php

use App\Http\Controllers\BladeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RotorController;
use App\Http\Controllers\TurbineController;
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
Route::resource('turbines', TurbineController::class)->names('turbines');
Route::resource('blades', BladeController::class)->names('blades');
Route::resource('rotors', RotorController::class)->names('rotors');