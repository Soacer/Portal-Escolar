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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Alunos
Route::get('/cadastrar/alunos', ['as' => 'cadastrar_aluno', 'uses' => 'AlunoController@index'])->middleware('auth');

Route::get('/mostrar/alunos', ['as' => 'mostrar_alunos', 'uses' => 'AlunoController@show'])->middleware('auth');
Route::delete('/mostrar/alunos/{id}', ['as' => 'deletar_aluno', 'uses' => 'AlunoController@delete'])->middleware('auth');
Route::put('/mostrar/alunos/{id}', ['as' => 'atualizar_aluno', 'uses' => 'AlunoController@update'])->middleware('auth');

Route::get('/mostrar/alunos/editar/{id}', ['as' => 'editar_aluno', function($id){
    $selecao = 'alunos';
    return view('editar', compact('id', 'selecao'));
}])->middleware('auth');

Route::post('/cadastrar/aluno/salvar', ['as' => 'salvar_aluno', 'uses' => 'AlunoController@create'])->middleware('auth');

//Professores
Route::get('/cadastrar/docentes', ['as' => 'cadastrar_docentes', 'uses' => 'ProfessorController@index'])->middleware('auth');
Route::post('/cadastrar/docentes/salvar', ['as' => 'salvar_docentes', 'uses' => 'ProfessorController@create'])->middleware('auth');
Route::get('/mostrar/docentes', ['as' => 'mostrar_docentes', 'uses' => 'ProfessorController@show'])->middleware('auth');
Route::delete('/mostrar/docentes/{id}', ['as' => 'deletar_docentes', 'uses' => 'ProfessorController@delete'])->middleware('auth');
Route::put('/mostrar/docentes/{id}', ['as' => 'atualizar_docentes', 'uses' => 'ProfessorController@update'])->middleware('auth');

Route::get('/mostrar/docentes/editar/{id}', ['as' => 'editar_docentes', function($id){
    $selecao = 'docentes';
    return view('editar', compact('id', 'selecao'));
}])->middleware('auth');