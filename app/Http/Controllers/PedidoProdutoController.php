<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos; //eager loading

        return view('app.pedido_produto.create', compact('pedido', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Pedido $pedido
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $request->validate([
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required',
        ],
        [
            'produto_id.exists' => 'Selecione um produto valido',
            'quantidade.required' => 'O campo quantidade é obrigatório',
        ]);

        // PedidoProduto::create([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $request->produto_id,	
        // ]);

        $pedido->produtos()->attach([
            $request->produto_id => ['quantidade' => $request->quantidade], 
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        $pedido = $pedidoProduto->pedido_id;
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', compact('pedido'));
    }
}
