<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcgDataController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
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


Route::get('', [DashboardController::class, '__invoke'])->middleware(['auth', 'verified'])->name('dashboard');;

Route::prefix('patients')->middleware('auth')->group(function() {
    Route::get('', [PatientController::class, 'index'])->name('patient.index');
    Route::get('add', [PatientController::class, 'add'])->name('patient.add');
    Route::get('edit/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::get('data/{patient}', [PatientController::class, 'patientData'])->name('patient.data');
    Route::post('',[PatientController::class, 'store'])->name('patient.store');
    Route::put('{patient}', [PatientController::class, 'update'])->name('patient.update');
});

Route::prefix('settings')->middleware('auth')->group(function() {
    Route::get('', [UserController::class, 'index'])->name('setting.index');
    Route::put('{user}', [UserController::class, 'update'])->name('setting.update');

});

Route::get('chart/data/{patient}', [EcgDataController::class, 'chartData'])->middleware('auth');

Route::get('ecg_data/{patient}/{data}', [EcgDataController::class, 'store']);

require __DIR__.'/auth.php';
