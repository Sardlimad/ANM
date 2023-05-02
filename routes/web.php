<?php

use App\Http\Controllers\academyController;
use App\Http\Controllers\articlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\UserController;
use App\Models\Operation;
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

Route::get('/', HomeController::class)->name('dashboard');

Route::get('/operations', OperationsController::class)->name('operations');

Route::resource('articles', articlesController::class);

Route::resource('student', studentController::class);

Route::resource('academy', academyController::class);

Route::resource('user', UserController::class);

Route::get('/login',function(){
    return view('login');
});