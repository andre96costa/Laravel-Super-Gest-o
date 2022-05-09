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

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function () {return 'Login';})->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function () {return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', function () {return 'fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function () {return 'produtos';})->name('app.produtos');
});

Route::fallback(function () {
    $link = '<a href="'.route('site.index').'">Retornar</a>';
    return "A rota acessada não existe {$link}";
});