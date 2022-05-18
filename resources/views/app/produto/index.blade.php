@extends('app.layouts.basico')

@section('title', 'Produto - Listar')
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listar produtos</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                            <td><a href="{{ route('produto.show', $produto->id) }}">Visualizar</a></td>
                            <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" action="{{ route('produto.destroy', $produto->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                   <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           {{ $produtos->appends($req)->links() }}
           <br>
           Exibindo {{ $produtos->count() }} fornecedores de {{ $produtos->total() }}
        </div>
    </div>
</div>
@endsection