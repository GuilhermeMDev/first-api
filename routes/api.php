<?php

use App\Http\Controllers\AlunosController;
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
Route::get('/alunos', [AlunosController::class, 'index']);
Route::get('/alunos/{id}', [AlunosController::class, 'show']); //pesquisa o aluno pelo id
Route::put('/alunos/{id}', [AlunosController::class, 'update']);
Route::post('/alunos', [AlunosController::class, 'store']);
Route::delete('/alunos/{id}', [AlunosController::class, 'destroy']);

