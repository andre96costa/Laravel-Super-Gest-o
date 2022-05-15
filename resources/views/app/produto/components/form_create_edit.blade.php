@if (isset($produto->id))
    <form action="{{ route('produto.update', $produto->id) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
    @method('POST')
@endif
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
    @error('nome')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <input type="text" name="descricao" placeholder="Descricao" class="borda-preta"  value="{{ $produto->descricao ?? old('descricao') }}">
    @error('descricao')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <input type="text" name="peso" placeholder="Peso" class="borda-preta"  value="{{ $produto->peso ?? old('peso') }}">
    @error('peso')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <select name="unidade_id" id="">
        <option>Selecione uma unidade de medida</option>
        @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>                    
        @endforeach
    </select>
    @error('unidade_id')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <button type="submit" class="borda-preta">{{isset($produto->id) ? 'Atualizar' : 'Cadastrar'}}</button>
</form>