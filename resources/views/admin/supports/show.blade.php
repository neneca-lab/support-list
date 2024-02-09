<h1>Detalhes da duvida {{ $support->id }}</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Conteudo: {{ $support->body }}</li>
    <li>Situação: {{ $support->status }}</li>
</ul>

<form action="{{ route('supports.destroy', $support->id) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
