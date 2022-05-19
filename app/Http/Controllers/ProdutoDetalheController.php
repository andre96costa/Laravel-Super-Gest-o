<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create([
            'produto_id' => $request->produto_id,
            'comprimento' => $request->comprimento,
            'largura' => $request->largura,
            'altura' => $request->altura,
            'unidade_id' => $request->unidade_id,
        ]);

        return redirect()->route('produto-detalhe.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto_detalhe = ProdutoDetalhe::with('produto')->find($id);
        $unidades = Unidade::all();

        return view('app.produto_detalhe.edit', compact('produto_detalhe', 'unidades'));
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
        $produto_detalhe = ProdutoDetalhe::find($id);
        $produto_detalhe->update([
            "produto_id" => $request->produto_id,
            "comprimento" => $request->comprimento,
            "largura" => $request->largura,
            "altura" => $request->altura,
            "unidade_id" => $request->unidade_id,
        ]);
       
        return redirect()->route('produto-detalhe.create');
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
