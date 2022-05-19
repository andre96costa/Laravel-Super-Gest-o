@if (isset($pedido->id))
    <form action="{{ route('pedido.update', $pedido->id) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('pedido.store') }}" method="post">
    @method('POST')
@endif
    @csrf
    <select name="cliente_id" id="">
        <option>Selecione um cliente</option>
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>                    
        @endforeach
    </select>
    @error('cliente_id')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <button type="submit" class="borda-preta">{{isset($pedido->id) ? 'Atualizar' : 'Cadastrar'}}</button>
</form>