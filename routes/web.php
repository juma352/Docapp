<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('appointments', AppointmentController::class)->except([
    'show'
]);


Route::post('/appointments/{appointment}/send-reminder', [AppointmentController::class, 'sendReminder'])
    ->middleware(['auth'])
    ->name('appointments.sendReminder');

Route::get('/appointments/{appointment}/preview-reminder', [AppointmentController::class, 'previewReminder'])
    ->middleware(['auth'])
    ->name('appointments.previewReminder');
