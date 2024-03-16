<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[TodoController::class, ('index')])->name('/index');
Route::post('/create', [TodoController::class, ('create')]);
Route::patch('/update', [TodoController::class, ('update')]);
Route::delete('/delete', [TodoController::class, ('delete')]);
Route::post('/search', [TodoController::class, ('search')]);

Route::get('/category', [CategoryController::class, ('index')])->name('/category');
Route::post('/category/create', [CategoryController::class, ('create')]);
Route::patch('/category/update', [CategoryController::class, ('update')]);
Route::delete('/category/delete', [CategoryController::class, ('delete')]);