<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\toDosController;
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

Route::get('/', [toDosController::class, 'index']);
Route::get('/new-todos', [toDosController::class, 'create']);
Route::get('/{todo}/edit', [toDosController::class, 'edit']);
Route::post('/{todo}/update-todos', [toDosController::class, 'update']);
Route::get('/{todo}/delete', [toDosController::class, 'destroy']);
Route::get('/{todo}/complete', [toDosController::class, 'complete']);
Route::get('/{todo}', [toDosController::class, 'show']);
Route::post('/store-todos', [toDosController::class, 'store']);


