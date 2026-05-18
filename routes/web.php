<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add people
    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
    Route::get('/people/create', [PeopleController::class, 'create'])->name('people.create');
    Route::post('/people', [PeopleController::class, 'store'])->name('people.store');
    Route::get('/people/{people}/edit', [PeopleController::class, 'edit'])->name('people.edit');
    Route::get('/people/{people}/show', [PeopleController::class, 'show'])->name('people.show');
    Route::put('/people/{people}', [PeopleController::class, 'update'])->name('people.update');
    Route::delete('/people/{people}', [PeopleController::class, 'destroy'])->name('people.delete');

    // Add people
    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');
    Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
    Route::post('/expense', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/expense/{expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::put('/expense/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/expense/{expense}', [ExpenseController::class, 'destroy'])->name('expense.delete');
});

require __DIR__.'/auth.php';
