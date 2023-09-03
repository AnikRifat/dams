<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// routes/web.php
Route::get('/fetchAppointmentData',  [TransactionController::class, 'fetchAppointmentData'])->name('fetchAppointmentData');
Route::get('/appointmentfilter',  [TransactionController::class, 'appointmentfilter'])->name('appointmentfilter');
Route::get('/shopfilter',  [TransactionController::class, 'shopfilter'])->name('shopfilter');
