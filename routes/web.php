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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuarios', 'usuariosController@index')->name('usuarios.index');
Route::post('/gravarnovousuario', 'usuariosController@gravarUsuario')->name('usuarios.gravarnovousuario');
Route::get('/itens', 'ItensController@index')->name('itens.index');
Route::post('/gravaritem', 'ItensController@gravarItem')->name('itens.gravaritem');
Route::get('/estoque', 'EstoqueController@index')->name('estoque.index');
Route::get('/buscaItens', 'ItensController@buscaItens')->name('itens.buscaItens');
Route::post('/gravarEstoque', 'EstoqueController@gravarEstoque')->name('estoque.gravarEstoque');


