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

Route::post('/cadastrar/aluno/salvar', ['as' => 'salvar_aluno', 'uses' => 'AlunoController@create'])->middleware('auth');

//Professores
Route::get('/cadastrar/docentes', ['as' => 'cadastrar_docentes', 'uses' => 'ProfessorController@index'])->middleware('auth');
