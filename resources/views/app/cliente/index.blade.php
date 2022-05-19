@extends('app.layouts.basico')

@section('title', 'Cliente')
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de clientes</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create') }}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('cliente.show', $cliente->id) }}">Visualizar</a></td>
                            <td><a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                   <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           {{ $clientes->appends($req)->links() }}
           <br>
           Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }}
        </div>
    </div>
</div>
@endsection