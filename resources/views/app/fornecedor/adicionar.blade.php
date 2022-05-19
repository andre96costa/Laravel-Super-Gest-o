@extends('app.layouts.basico')

@section('title', 'Fornecedor - Adicionar')
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>{{isset($fornecedor->id) ? 'Editar' : 'Cadastrar'}} Fornecedor</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                @method('POST')
                @csrf
                <input type="hidden" name="id"  value="{{ $fornecedor->id ?? ''}}">
                <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $fornecedor->nome ?? old('nome') }}">
                @error('nome')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
                <input type="text" name="site" placeholder="Site" class="borda-preta"  value="{{ $fornecedor->site ?? old('site') }}">
                @error('site')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
                <input type="text" name="email" placeholder="E-mail" class="borda-preta"  value="{{ $fornecedor->email ?? old('email') }}">
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
                <input type="text" name="uf" placeholder="UF" class="borda-preta"  value="{{ $fornecedor->uf ?? old('uf') }}">
                @error('uf')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
                <button type="submit" class="borda-preta">{{isset($fornecedor->id) ? 'Editar' : 'Cadastrar'}}</button>
            </form>
        </div>
    </div>
</div>
@endsection