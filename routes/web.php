<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;

use App\Http\Controllers\Admin\TaskController;

use App\Http\Controllers\Client\TaskController as ClientTask;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin_dashboard');
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ---------- Client ----------
// Client Routes
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

    Route::middleware('client')->group(function () {
        Route::get('/dashboard', function () {
            return view('client.dashboard');
        })->name('dashboard');
    });
});
// ---------- End : Client ---------

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::prefix('client')->name('client.')->middleware('client')->group(function () {
    Route::get('/tasks', [ClientTask::class, 'index'])->name('tasks.index');
    Route::post('/tasks/{task}/complete', [ClientTask::class, 'complete'])->name('tasks.complete');
});