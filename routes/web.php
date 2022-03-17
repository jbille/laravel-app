<?php

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

use App\Http\Controllers\TeamsController;
 
Route::get('/create', [TeamsController::class, 'create']);
Route::get('/show', [TeamsController::class, 'show']);
Route::get('/edit', [TeamsController::class, 'edit']);
Route::get('/store', [TeamsController::class, 'store']);
Route::get('/update', [TeamsController::class, 'update']);
Route::get('/delete', [TeamsController::class, 'destroy']);

Route::get('/', [TeamsController::class, 'index']);
