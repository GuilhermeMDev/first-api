<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\DiveTableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//first CRUD
Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']); //pesquisa o aluno pelo id
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::post('/student', [StudentController::class, 'store']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);

