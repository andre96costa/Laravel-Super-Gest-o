{{ $slot }}

@if ($errors->any())
    {{ $errors }}
@endif
<form action="{{ route('site.contato') }}" method="POST">
    @method('POST')
    @csrf
    <input type="text" placeholder="Nome" class="{{ $classe }}" name="nome" value="{{ old('nome') }}">
    <br>
    <input type="text" placeholder="Telefone" class="{{ $classe }}" name="telefone" value="{{ old('telefone') }}">
    <br>
    <input type="text" placeholder="E-mail" class="{{ $classe }}" name="email" value="{{ old('email') }}">
    <br>
    <select class="{{ $classe }}" name="motivo_contato">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $value)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : ''}}>{{ $value }}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $classe }}" name="mensagem">{{ old('mensagem') ?? 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>