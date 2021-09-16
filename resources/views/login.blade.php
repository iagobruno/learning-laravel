<h2>Fazer login</h2>

<form action="{{ route('login.auth') }}" method="post">
    @method('POST')
    @csrf
    <button type="submit">Entrar como um usuário aleatório</button>
</form>
