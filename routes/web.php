<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', HomeController::class)->name('dashboard');

    Route::get('/dashboard', HomeController::class)->name('dashboard');

    Route::resource('articles', ArticlesController::class);

    Route::get('operations/', [OperationsController::class, 'index'])->middleware('can:operations.index')->name('operations');

    Route::put('operations/{operation}', [OperationsController::class, 'update'])->middleware('can:operations.update')->name('operations.update');

    Route::post('operations/{article}', [OperationsController::class, 'store'])->middleware('can:operations.create')->name('operations.store');

    Route::resource('students', StudentsController::class);

    Route::resource('role', RoleController::class);

    Route::resource('academy', AcademyController::class);

    Route::resource('user', UserController::class);

    });

require __DIR__ . '/auth.php';
