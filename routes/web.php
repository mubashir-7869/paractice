<?php

use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserChangePassword;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', HomeController::class)->name('home');

// Auth Middleware
Route::middleware('auth')->group(function () {
    Route::resource('book', BookController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy'])->parameters(['book' => 'slug']);

    Route::get('book/{book:slug}/report/create', [BookReportController::class, 'create'])->name('books.report.create');
    Route::post('book/{book}/report', [BookReportController::class, 'store'])->name('books.report.store');

    Route::get('user/books', [BookController::class, 'index'])->name('user.books.list');
    Route::get('user/orders', [OrderController::class, 'index'])->name('user.orders.index');

    Route::prefix('user/settings')->group(function () {
        Route::get('/', [UserSettingsController::class, 'index'])->name('user.settings');
        Route::post('{user}', [UserSettingsController::class, 'update'])->name('user.settings.update');
        Route::post('password/change/{user}', [UserChangePassword::class, 'update'])->name('user.password.update');
    });
});

// Admin Middleware
Route::middleware('isAdmin')->group(function () {
    Route::get('admin', AdminDashboardController::class)->name('admin.index');

    Route::resource('admin/books', AdminBookController::class)->except(['show'])->parameters(['admin.books' => 'book']);
    Route::put('admin/book/approve/{book}', [AdminBookController::class, 'approveBook'])->name('admin.books.approve');

    Route::resource('admin/users', AdminUsersController::class)->except(['show']);
});

// Authentication Routes
require __DIR__ . '/auth.php';
