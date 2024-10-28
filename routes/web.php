<?php

use App\Controllers\EventController as ControllersEventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserJournalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController; // Pastikan namespace ini benar
use App\Http\Controllers\SearchController;
use App\Http\Controllers\JournalController;


use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index']);
Route::get('/welcome', [HomeController::class, 'index']);

// Route untuk form
Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class,'store']); // menyimpan data

// Route untuk halaman profil
Route::get('/journals', [UserJournalController::class, 'index']);
Route::get('/journals', [UserJournalController::class, 'showForUser'])->name('journals');
// Route Untuk ke halaman profil
Route::get('/journals', [JournalController::class, 'index']);


// Route untuk pesan
Route::get('/message', [MessageController::class, 'index']);

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'admin'])->group(function () {
    // Definisikan route logout
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // atau
    // Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::middleware('auth')->group(function () {
// Route untuk halaman admin (dengan middleware auth)
Route::get('/admin.admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
// Route untuk halaman user (jika user biasa)
Route::get('/welcome', [HomeController::class, 'index'])->name('welcome')->middleware('auth');
});

// Routes untuk admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // Message routes
    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    // Routes untuk journals dalam admin
    Route::get('/journals', [JournalController::class, 'adminIndex'])->name('journals.index');
    Route::get('/journals/create', [JournalController::class, 'create'])->name('journals.create');
    Route::post('/journals', [JournalController::class, 'store'])->name('journals.store');
    Route::get('/journals/{journal}/edit', [JournalController::class, 'edit'])->name('journals.edit');
    Route::put('/journals/{journal}', [JournalController::class, 'update'])->name('journals.update');
    Route::delete('/journals/{journal}', [JournalController::class, 'destroy'])->name('journals.destroy');

    // Routes untuk events dalam admin
    Route::get('/events', [EventController::class, 'adminIndex'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

// Routes untuk user
Route::get('/journals', [JournalController::class, 'userIndex'])->name('journals.user');
Route::get('/events', [EventController::class, 'userIndex'])->name('events.user');

// Route untuk search
Route::get('/search', [SearchController::class, 'search'])->name('search');
