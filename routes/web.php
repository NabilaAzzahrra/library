<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoanPackageController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SourcesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('faculty', FacultyController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('classes', ClassesController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('sources', SourcesController::class);
    Route::resource('loanPackages', LoanPackageController::class);
});

require __DIR__.'/auth.php';
