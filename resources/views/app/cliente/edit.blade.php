@extends('app.layouts.basico')

@section('title', 'Editar - Cliente')
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
       <p>Editar Cliente</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('app.cliente.components.form_create_edit', ['cliente' => $cliente])
            @endcomponent
        </div>
    </div>
</div>
@endsection