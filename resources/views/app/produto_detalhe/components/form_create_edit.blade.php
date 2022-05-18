@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', $produto_detalhe->id) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
    @method('POST')
@endif
    @csrf
    <input type="text" name="produto_id" placeholder="Id do produto" class="borda-preta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
    @error('produto_id')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <input type="text" name="comprimento" placeholder="Comprimento" class="borda-preta"  value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
    @error('comprimento')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <input type="text" name="largura" placeholder="Largura" class="borda-preta"  value="{{ $produto_detalhe->largura ?? old('largura') }}">
    @error('largura')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <input type="text" name="altura" placeholder="Altura" class="borda-preta"  value="{{ $produto_detalhe->altura ?? old('altura') }}">
    @error('altura')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <select name="unidade_id" id="">
        <option>Selecione uma unidade de medida</option>
        @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>                    
        @endforeach
    </select>
    @error('unidade_id')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <button type="submit" class="borda-preta">{{isset($produto_detalhe->id) ? 'Atualizar' : 'Cadastrar'}}</button>
</form>