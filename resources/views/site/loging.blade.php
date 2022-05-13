@extends('site.layouts.basico')

@section('title', 'Login')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                @isset($erro)
                <span style="color: red;">{{ $erro }}</span>
                @endisset
                <form action="{{ route('site.login') }}" method="POST">
                    @method('POST')
                    @csrf
                    <input type="text" name="usuario" class="borda-preta" placeholder="Usuário">
                    <br>
                    @error('usuario')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    <input type="password" name="senha" class="borda-preta" placeholder="Senha">
                    <br>
                    @error('senha')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    <button type="input">Acessar</button>
                </form>
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection