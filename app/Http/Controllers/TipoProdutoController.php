<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT * FROM TIPO_PRODUTOS e armazenando resultados
        //no objeto $tipoProdutos.
        //Este objeto é um array de models.
        //$tipoProdutos = TipoProduto::all();
        $tipoProdutos = DB::select('SELECT * FROM TIPO_PRODUTOS', [1]);      

        //print_r($tipoProdutos);

        return view("TipoProduto/index") -> with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TipoProduto/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request->descricao ."<br>";
        echo $request->_token ."<br>";

        // $tipoProduto = TipoProduto();
        // $tipoProduto->descricao = $request->descricao;
        // $tipoProduto->save();
        // return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoProduto = DB::select("SELECT
                    tipo_produtos.id as id,
                    tipo_produtos.descricao as descricao,
                    tipo_produtos.updated_at as updated_at,
                    tipo_produtos.created_at as created_at
                from tipo_produtos
                where id = ?", [$id]);


        if(count($tipoProduto) > 0)
        return view("TipoProduto/show")->with("tipoProduto", $tipoProduto[0]);

        echo "Tipo de Produto não encontrado não encontrado!";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoproduto = TipoProduto::find($id);

        if(isset($tipoproduto)){
            //dd($tipoproduto);
            return view("TipoProduto/edit")
                                        ->with("tipoproduto", $tipoproduto);

        }
        //#TODO implementar tratamento de exceção
        
        echo "Tipo de produto não encontrado";
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
        
       $tipoproduto = TipoProduto::find($id);

       if(isset($tipoproduto)){
           $tipoproduto->descricao = $request->descricao;
           $tipoproduto->update();
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
