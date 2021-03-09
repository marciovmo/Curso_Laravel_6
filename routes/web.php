<?php

use Illuminate\Support\Facades\Route;

/*Permite acesso com parametros dinâmicos*/
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

/*Permite acesso com parametros */
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da Categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da Categoria: {$flag}";
});

/*Permite acesso com metodos definidos */
Route::match(['get','post'],'/match', function () {
    return 'match';
});

/*Permite acesso com qualquer metodo */
Route::any('/any', function () {
    return 'Any';
});

Route::get('/contact', function () {
    return view('site.contact');
});

Route::get('/empresa', function () {
    return 'Sobre a Empresa';
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get('/', function () {
    return view('welcome');
});
