<?php

use App\Http\Controllers\academyController;
use App\Http\Controllers\articlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\studentController;
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

Route::get('/', HomeController::class);

/* ARTICLE */

Route::get('/article', [articlesController::class,'index'])->name('article');

Route::get('/article/create', [articlesController::class,'create']);

Route::get('/article/{$article}', [articlesController::class,'show']);

/* STUDENT */

Route::get('/student', [studentController::class, 'index']);

Route::get('/student/create', [studentController::class, 'create'] );

Route::get('/student/{$student}', [studentController::class, 'show'] ); 

/* ACADEMY */

Route::get('/academy', [academyController::class, 'index']);

Route::get('/academy/create', [academyController::class, 'create']);

Route::get('/academy/{$academy}', [academyController::class, 'show']);



Route::get('/operations',function(){
    return view('operations');
});

/* USER */

Route::get('/user', [UserController::class, 'index']);

Route::get('/user/create', [UserController::class, 'create']);

Route::get('/user/{$user}', [UserController::class, 'show']);

Route::get('/login',function(){
    return view('login');
});