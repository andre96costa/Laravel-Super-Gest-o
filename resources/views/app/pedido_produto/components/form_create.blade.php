<form action="{{ route('pedido-produto.store', $pedido->id) }}" method="post">
    @method('POST')
    @csrf
    <select name="produto_id">
        <option>-- Selecione um produto --</option>
        @foreach ($produtos as $produto )
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>{{ $produto->nome }}</option>
        @endforeach
    </select>
    @error('produto_id')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') ?  old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta" />
    @error('quantidade')
    <span style="color: red;">{{ $message }}</span>
    @enderror
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>