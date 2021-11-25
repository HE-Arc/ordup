<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\DrinkController;
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
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('drinks/admin', [DrinkController::class, 'admin'])->name('drinks.admin');
Route::resource('/drinks', DrinkController::class);

Route::get('commands', [CommandController::class, 'index'])->name('commands');
Route::post('commands/create', [CommandController::class, 'create'])->name('commands.create');
Route::get('commands/pay/{id}', [CommandController::class, 'pay'])->name('commands.pay');

require __DIR__.'/auth.php';
