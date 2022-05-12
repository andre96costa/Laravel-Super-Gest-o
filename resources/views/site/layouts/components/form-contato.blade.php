{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @method('POST')
    @csrf
    <input type="text" placeholder="Nome" class="{{ $classe }}" name="nome" value="{{ old('nome') }}">
    <br>
    @error('nome')
       <span style="color: red;"> {{ $message }}</span>
    @enderror
    <input type="text" placeholder="Telefone" class="{{ $classe }}" name="telefone" value="{{ old('telefone') }}">
    <br>
    @error('telefone')
       <span style="color: red;"> {{ $message }}</span>
    @enderror
    <input type="text" placeholder="E-mail" class="{{ $classe }}" name="email" value="{{ old('email') }}">
    <br>
    @error('email')
       <span style="color: red;"> {{ $message }}</span>
    @enderror
    <select class="{{ $classe }}" name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $value)
            <option value="{{ $value->id }}" {{ old('motivo_contatos_id') == $value->id ? 'selected' : ''}}>{{ $value->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    @error('motivo_contatos_id')
       <span style="color: red;"> {{ $message }}</span>
    @enderror
    <textarea class="{{ $classe }}" name="mensagem">{{ old('mensagem') ?? 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    @error('mensagem')
       <span style="color: red;"> {{ $message }}</span>
    @enderror
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>