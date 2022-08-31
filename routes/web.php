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


// Route::get('teste', function () {
//     echo    "<html>
//                 <h1>Teste</h1>
//             </html>";
// });

// Route::get('ola/{nome?}', function ($nome = null) {
//     if(isset($nome))
//         echo    "Olá. Seja bem vindo, $nome!";
        
//     else
//         echo    "Olá. Seja bem vindo!";
// });

// Route::get('ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
//     echo    "Olá. Seja bem vindo, $nome $sobrenome!";
// });

// //  TAREFA 4:

// Route::get('tipoproduto/add/{descricao}', function ($descricao) {
//     $tipoProduto = new TipoProduto();
//     $tipoProduto->descricao = $descricao;
//     $tipoProduto->save();
// });

// Route::get('produto/add/{nome}/{preco}/{Tipo_Produtos_id}/{ingredientes}/{urlImage}',
// function($nome, $preco, $Tipo_Produtos_id, $ingredientes, $urlImage) {
//     $produto = new Produto();
//     $produto->nome = $nome;
//     $produto->preco = $preco;
//     $produto->Tipo_Produtos_id = $Tipo_Produtos_id;
//     $produto->ingredientes = $ingredientes;
//     $produto->urlImage = $urlImage;
//     $produto->save();
// });