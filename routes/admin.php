<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

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
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');

Route::get('/admin', function () {
    return view('Admin.layouts.master');
});

#### Admin ####
Route::resource('admin', AdminController::class);

#### Patient ####
Route::resource('patients', PatientController::class);

#### Appointment ####
Route::resource('appointments', AppointmentController::class);


