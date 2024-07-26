<?php

use App\Http\Controllers\ZabiegiController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/zabiegi', [zabiegiController::class, 'index'])->name('zabiegi.index');

Route::get('/zabiegi/dodaj', [zabiegiController::class, 'dodaj'])->name('zabiegi.create');
Route::get('/zabiegi/edytuj/{id}', [zabiegiController::class, 'edit'])->name('zabiegi.edit');
Route::post('/zabiegi/zapisz', [zabiegiController::class, 'store'])->name('zabiegi.store');
Route::put('/zabiegi/zmien/{id}', [zabiegiController::class, 'update'])->name('zabiegi.update');
Route::delete('/zabiegi/usun/{id}', [zabiegiController::class, 'delete'])->name('zabiegi.delete');

Route::resource('pacjenci', PatientController::class);