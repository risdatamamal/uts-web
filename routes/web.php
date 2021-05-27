<?php

use App\Http\Controllers\{HomeController, DashboardController};
use App\Http\Controllers\Book\BookController;
use Illuminate\Support\Facades\{Route, Auth};

Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('books')->group( function () {
        Route::get('create', [BookController::class, 'create'])->name('books.create');
        Route::post('create', [BookController::class, 'store']);
        Route::get('table', [BookController::class, 'table'])->name('books.table');
        Route::get('{book:slug}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('{book:slug}/edit', [BookController::class, 'update']);
    });
});
