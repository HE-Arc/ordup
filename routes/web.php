<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware(['guest'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function() {
    return inertia('Admin/AdminPanel');
})->middleware(['auth', 'admin'])->name('admin');

Route::get('drinks/admin', [DrinkController::class, 'admin'])->middleware(['auth', 'admin'])->name('drinks.admin');
Route::resource('/drinks', DrinkController::class)->middleware(['auth']);

Route::put('commands/{id}/pay', [CommandController::class, 'pay'])->middleware(['auth'])->name('commands.pay');
Route::resource('/commands', CommandController::class)->middleware(['auth']);

Route::resource('/users', UserController::class)->middleware(['auth', 'admin']);



require __DIR__ . '/auth.php';
