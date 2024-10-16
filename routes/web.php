<?php

use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/pacjent', [PatientController::class, 'index'])->name('patient.index');

Route::get('/pacjent/dodaj', [PatientController::class, 'create'])->name('patient.create');
Route::get('/pacjent/edytuj/{id}', [PatientController::class, 'edit'])->name('patient.edit');
Route::post('/pacjent/zapisz', [PatientController::class, 'store'])->name('patient.store');
Route::put('/pacjent/zmien/{id}', [PatientController::class, 'update'])->name('patient.update');
Route::delete('/pacjent/usun/{id}', [PatientController::class, 'delete'])->name('patient.delete');

Route::get('/zabiegi', [ProcedureController::class, 'index'])->name('procedure.index');

Route::get('/kadra', [TeamController::class, 'index'])->name('team.index');
Route::post('/kadra', [TeamController::class, 'store'])->name('team.store');
Route::get('/kadra/edytuj/{id}', [TeamController::class, 'edit'])->name('team.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';