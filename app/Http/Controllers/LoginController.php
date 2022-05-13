<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->error;
        if ($request->error == 1) {
            $erro = 'Usuário ou senha invalidos!';
        }
        if ($request->error == 2) {
            $erro = 'Necessario realizar login para acessar a página';
        }
        return view('site.loging', compact('erro'));
    }

    public function autenticar(Request $request)
    {
       $request->validate([
                'usuario' => 'email',
                'senha'   => 'required'
            ],
            [
                'email' => 'O campo usuário é obrigatório',
                'senha.required' => 'O campo senha é obrigatório'
            ]
        );

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = User::where('email', $email)->where('password', $password)->get()->first();
        
        if ($user) {
            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        } 
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
