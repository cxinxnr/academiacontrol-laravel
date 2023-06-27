<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/cadastro-cliente', [ClienteController::class, 'exibeCadastro'])->middleware('auth');
Route::post('/cadastro-cliente', [ClienteController::class, 'enviaFormCadastro'])->middleware('auth');
Route::get('/lista-cliente', [ClienteController::class, 'listarClientes'])->middleware('auth');
Route::get('/editar-cliente/{id}', [ClienteController::class, 'buscarCliente'])->middleware('auth');
Route::post('/editar-cliente/{id}', [ClienteController::class, 'enviaFormEdicao'])->name('editar-cliente')->middleware('auth');
Route::get('/excluir-cliente/{id}', [ClienteController::class, 'excluirCliente'])->middleware('auth');
Route::get('/cadastro-plano', [PlanoController::class, 'exibeCadastro'])->middleware('auth');
Route::post('/cadastro-plano', [PlanoController::class, 'enviaFormCadastro'])->middleware('auth');
Route::get('/lista-plano', [PlanoController::class, 'listarPlanos'])->middleware('auth');
Route::get('/editar-plano/{id}', [PlanoController::class, 'buscarPlano'])->middleware('auth');
Route::post('/editar-plano/{id}', [PlanoController::class, 'enviaFormEdicao'])->name('editar-plano')->middleware('auth');
Route::get('/excluir-plano/{id}', [PlanoController::class, 'excluirPlano'])->middleware('auth');
Route::get('/cadastro-aula', [AulaController::class, 'exibeCadastro'])->middleware('auth');
Route::post('/cadastro-aula', [AulaController::class, 'enviaFormCadastro'])->middleware('auth');
Route::get('/lista-aula', [AulaController::class, 'listarAulas'])->middleware('auth');
Route::get('/editar-aula/{id}', [AulaController::class, 'buscarAula'])->middleware('auth');
Route::post('/editar-aula/{id}', [AulaController::class, 'enviaFormEdicao'])->name('editar-aula')->middleware('auth');
Route::get('/excluir-aula/{id}', [AulaController::class, 'excluirAula'])->middleware('auth');