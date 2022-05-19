@extends('app.layouts.basico')

@section('title', 'Pedido')
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Lista de pedidos</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Id do pedido</th>
                        <th>Cliente</th>
                        <th>Adicionar Produto</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('pedido-produto.create', $pedido->id) }}">Adicionar produtos</a></td>
                            <td><a href="{{ route('pedido.show', $pedido->id) }}">Visualizar</a></td>
                            <td><a href="{{ route('pedido.edit', $pedido->id) }}">Editar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" action="{{ route('pedido.destroy', $pedido->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                   <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           {{ $pedidos->appends($req)->links() }}
           <br>
           Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }}
        </div>
    </div>
</div>
@endsection