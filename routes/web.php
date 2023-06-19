<?php

use App\Http\Controllers\SubunitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;

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

Route::get('/', [TruckController::class, 'index']);
Route::get('trucks', [TruckController::class, 'index']);
Route::get('trucks/{id}', [TruckController::class, 'show'])
    ->whereNumber('id');
Route::get('trucks/create', [TruckController::class, 'create']);
Route::post('trucks/create', [TruckController::class, 'store']);
Route::get('trucks/edit/{id}', [TruckController::class, 'edit'])
    ->name('trucks.edit');
Route::post('trucks/edit/{id}', [TruckController::class, 'edit']);
Route::delete('trucks/delete/{id}', [TruckController::class, 'delete'])
    ->name('trucks.delete');
Route::get('subunits/create/{id}', [SubunitController::class, 'create'])
    ->name('subunits.create');
Route::post('subunits/create', [SubunitController::class, 'store']);