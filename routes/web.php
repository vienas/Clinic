<?php

use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/logout', [ProfileController::class, 'logout']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

// route::get('procedure\index', [HomeController::class, 'index'])->middleware(['auth', 'admin']);







// Route::get('/', function () {
    //     return view('welcome');
    // });
    
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    
    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });
    
    // require __DIR__.'/auth.php';
    
    // route::get('procedure\index', [HomeController::class, 'index'])->middleware(['auth', 'admin']);