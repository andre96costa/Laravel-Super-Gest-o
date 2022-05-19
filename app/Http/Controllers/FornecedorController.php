<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->nome.'%')
        ->where('nome', 'like', '%'.$request->nome.'%')
        ->where('site', 'like', '%'.$request->site.'%')
        ->where('uf', 'like', '%'.$request->uf.'%')
        ->where('email', 'like', '%'.$request->email.'%')
        ->paginate(2);
        
        $res = $request->all();
        return view('app.fornecedor.listar', compact('fornecedores', 'res'));
    }

    public function adicionar(Request $request)
    {
        if (!isset($request->_token) && empty($request->id)) {
            return view('app.fornecedor.adicionar');
        }
        
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|min:2|max:3',
            'email' => 'email',
        ],
        [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 2 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'uf.min' => 'O campo nome deve ter no minimo 2 caracteres',
            'uf.max' => 'O campo nome deve ter no máximo 3 caracteres',
            'email' => 'O campo e-mail não foi preenchido corretamente',
        ]);

        if (isset($request->id)) {
            $fornecedor = Fornecedor::find($request->id);
            $fornecedor->nome = $request->nome;
            $fornecedor->site = $request->site;
            $fornecedor->uf = $request->uf;
            $fornecedor->email = $request->email;
            $fornecedor->update();
            
            $msg = 'Fornecedor atualizado com sucesso!';
        } else {
            Fornecedor::create([
                'nome' => $request->nome,
                'site' => $request->site,
                'uf' => $request->uf,
                'email' => $request->email,
            ]);
            $msg = 'Fornecedor cadastrado com sucesso!';
        }

        return view('app.fornecedor.index', ['msg' => $msg]);
    }

    public function editar($id)
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', compact('fornecedor'));  
    }

    public function excluir($id)
    {
        Fornecedor::destroy($id);
        return view('app.fornecedor.index', ['msg' => "Fornecedor excluído"]);
    }
}
