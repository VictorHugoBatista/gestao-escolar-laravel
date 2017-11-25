<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('adicionar-aluno', function() {
    return view('aluno.adicionar');
});
Route::post('insere-aluno', ['uses' => 'AlunoController@insereAluno']);
Route::get('listar-alunos', ['uses' => 'AlunoController@listarAlunos']);
Route::get('aluno/{aluno}', ['uses' => 'AlunoController@exibeDadosAluno']);

Route::resource('boletim', 'BoletimController');
