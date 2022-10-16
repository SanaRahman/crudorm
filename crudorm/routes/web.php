<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Auth\Access\Response;
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
Route::prefix('')->middleware('auth','isAdmin')->group(function(){
Route::get('/', [StudentController::class,'index'])->name('home');
Route::post('/', [StudentController::class,'create'])->name('create');
//Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::put('/edit/{id}',[StudentController::class,'update'])->name('update');
Route::get('/delete/{id}',[StudentController::class,'destroy'])->name('destroy');
Route::get('/view_detail/{id}',[StudentController::class,'store'])->name('view_detail');
});

Route::get('/show', [StudentController::class,'show'])->name('show');

//Route::get('/edit/{id}',[StudentController::class,'edit'])->middleware('can:admin');
Route::get('/edit/{id}',[StudentController::class,'edit']);
Auth::routes();
Route::get('/h', [App\Http\Controllers\HomeController::class, 'index'])->name('h');
