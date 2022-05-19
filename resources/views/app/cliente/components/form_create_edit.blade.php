@if (isset($cliente->id))
    <form action="{{ route('cliente.update', $cliente->id) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
    @method('POST')
@endif
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}">
    @error('nome')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <button type="submit" class="borda-preta">{{isset($cliente->id) ? 'Atualizar' : 'Cadastrar'}}</button>
</form>