<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $val = 1;
      //  $produtos = DB::select('SELECT * FROM PRODUTOS WHERE id = ?', [$val]);


        $produtos = DB::select("SELECT PRODUTOS.ID AS id, 
                                        PRODUTOS.NOME AS nome,
                                        PRODUTOS.PRECO AS preco,
                                        TIPO_PRODUTOS.DESCRICAO AS descricao
                                        FROM PRODUTOS
                                        JOIN TIPO_PRODUTOS ON 
                                        PRODUTOS.TIPO_PRODUTOS_ID = TIPO_PRODUTOS.ID"); //Sempre retorna um array []
                                        
        return view("Produto/index") -> with("produtos", $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProdutos = DB::select('SELECT * FROM TIPO_PRODUTOS');

        return view("Produto/create") -> with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto ->nome = $request -> nome;
        $produto ->preco = $request -> preco;
        $produto ->Tipo_Produtos_id = $request -> Tipo_Produtos_id;
        $produto ->ingredientes = $request -> ingredientes;
        $produto ->urlImage = $request -> urlImage;
        
        $produto -> save();
        return $this -> index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = DB::select("SELECT
                                    produtos.id as id,
                                    produtos.nome as nome,
                                    produtos.preco as preco,
                                    produtos.Tipo_Produtos_id as Tipo_Produtos_id,
                                    tipo_produtos.descricao as descricao,
                                    produtos.ingredientes as ingredientes,
                                    produtos.urlimage as urlImage,
                                    produtos.updated_at as updated_at,
                                    produtos.created_at as created_at
                                from produtos
                                join tipo_produtos on produtos.Tipo_Produtos_id = Tipo_Produtos_id
                                where Produtos.id = ?", [$id]);


        if(count($produtos) > 0)
            return view("Produto/show")->with("produto", $produtos[0]);

        echo "Produto não encontrado!";


       // $produto = DB::select('SELECT * FROM Produtos where active = ?', [1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);

        if(isset($produto)){

            //Array com todos os tipo produtos do banco.
            $tipoProdutos = TipoProduto::all();
            return view("Produto/edit")
                                        ->with("produto", $produto)
                                        ->with("tipoProdutos", $tipoProdutos);

        }
        //#TODO implementar tratamento de exceçã
        
        echo "Produto não encontrado";
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // echo "Tipo $request->Tipo_Produtos_id";

       $produto = Produto::find($id);

       if(isset($produto)){
           $produto->nome = $request->nome;
           $produto->preco = $request->preco;
           $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
           $produto->ingredientes = $request->ingredientes;
           $produto->urlImage = $request->urlImage;
           $produto->update();
           //Recarregar view index:
           return $this->index();
       }
       //Tratar exceções.
       echo "Produto não encontrado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
