@extends('app.layouts.basico')

@section('title', 'Cliente - Detalhes')
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
       <p>Informações do Cliente</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
           <table border="1" style="text-align: left;">
               <tr>
                   <td>ID</td>
                   <td>{{ $cliente->id }}</td>
               </tr>
               <tr>
                    <td>Nome</td>
                    <td>{{ $cliente->nome }}</td>
                </tr>
           </table>
        </div>
    </div>
</div>
@endsection