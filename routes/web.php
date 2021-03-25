<?php

use Illuminate\Support\Facades\Route;

/*Aplicando middleware na rota para filtrar acesso mediante auteticação*/ 
//Route::resource('products', 'ProductController')->middleware('auth');
Route::resource('products', 'ProductController');

/*
//Rota para deletar um produto
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

//Rota edição de produto
Route::put('products/{id}', 'ProductController@update')->name('products.update');

//Rota exibir o form de update(edição) de produto
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

//Rota de criação de novo produto
Route::get('products/create', 'ProductController@create')->name('products.create');

//Rota com Controller com passagem de parâmetros
Route::get('products/{id}', 'ProductController@show')->name('products.show');

//Rota com Controller
Route::get('products', 'ProductController@index')->name('products.index');

//Rota com Controller para cadastrar com metodo POST
Route::post('products', 'ProductController@store')->name('products.store');
*/


Route::get('/login', function () {
    return 'Login';
})->name('login');

/*
//Autenticação através de filtros middleware para acessar grupo de rotas com prefixo
//Route::middleware(['auth'])->group(function () {

Route::middleware([])->group(function () {
    
    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {

            Route::name('admin.')->group(function () {

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('produtcs');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});


Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function (){
        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
        Route::get('/produtos', 'TesteController@teste')->name('produtcs');

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        })->name('home');
});

Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

//Rotas nomeadas no Laravel
Route::get('/nome-url', function () {
    return 'Hey, hey hey';
})->name('url.name');

//Retornar uma view estática:
Route::view('/view','site.contact' );

//Permite redirecionar a rota
Route::redirect('/redirect1','redirect2');

//Permite redirecionar a rota
// Route::get('redirect1', function () {
//     return redirect('/redirect2');
// });

Route::get('redirect2', function () {
    return 'Redirect 02';
});

//Permite acesso com parametros dinâmicos
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

//Permite acesso com parametros 
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da Categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da Categoria: {$flag}";
});

//Permite acesso com metodos definidos 
Route::match(['get','post'],'/match', function () {
    return 'match';
});

//Permite acesso com qualquer metodo 
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
