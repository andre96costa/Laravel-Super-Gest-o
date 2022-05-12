<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', compact('motivo_contatos'));
    }

    public function salvar(Request $request)
    {
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        $request->validate([
            "nome" => 'required|min:3|max:40',
            "telefone" => 'required',
            "email" => 'required|email',
            "motivo_contatos_id" => 'required',
            "mensagem" => 'required|max:2000',
        ]);
       
        SiteContato::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'motivo_contatos_id' => $request->input('motivo_contatos_id'),
            'mensagem' => $request->input('mensagem'),
        ]);
        
        return redirect()->route('site.index');
    }
}
