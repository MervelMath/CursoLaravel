<?php

use Illuminate\Support\Facades\Route;
use App\Models\TipoProduto;
use App\Models\Produto;

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

//cria todas as rotas do controlador, automaticamente.
Route::resource('/tipoproduto', 'App\Http\Controllers\TipoProdutoController');
Route::resource('/produto', 'App\Http\Controllers\ProdutoController');


Route::get('teste', function (){
    $produto = Produto::find(1);
    //$produto = Produto::where('nome', 'pizza')->get();
    dd($produto);
});