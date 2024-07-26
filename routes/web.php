<?php

use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/pacjent', [PatientController::class, 'index'])->name('patient.index');

Route::get('/pacjent/dodaj', [PatientController::class, 'dodaj'])->name('patient.create');
Route::get('/pacjent/edytuj/{id}', [PatientController::class, 'edit'])->name('patient.edit');
Route::post('/pacjent/zapisz', [PatientController::class, 'store'])->name('patient.store');
Route::put('/pacjent/zmien/{id}', [PatientController::class, 'update'])->name('patient.update');
Route::delete('/pacjent/usun/{id}', [PatientController::class, 'delete'])->name('patient.delete');

Route::resource('zabiegi', ProcedureController::class);

Route::get('/logowanie/login', [LoginController::class, 'login'])->name('login.index');