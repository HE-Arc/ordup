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
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('drinks/admin', [DrinkController::class, 'admin'])->name('drinks.admin');
Route::resource('/drinks', DrinkController::class);

Route::put('commands/{id}/pay', [CommandController::class, 'pay'])->name('commands.pay');
Route::resource('/commands', CommandController::class);

Route::get('/addEmployee', function () {
    return Inertia::render('User/AddUser');
})->name('addEmployee');

Route::post('/addEmployee', [UserController::class, 'addEmployee'])->name('addEmployee');

require __DIR__ . '/auth.php';
