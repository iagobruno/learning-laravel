<header>
    <nav>
        <a href="/">Página inicial</a>
        <a href="{{ route('products.index') }}">Produtos</a>
        @auth
            <form action="{{ route('products.create') }}" method="get">
                <button type="submit">Criar produto</button>
            </form>
        @endauth
    </nav>

    <span style="margin-left: auto;">
        @auth
            Olá {{ auth()->user()->name }}!
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Sair</button>
            </form>
        @else
            <form action="{{ route('login') }}" method="get">
                <button type="submit">Fazer login</button>
            </form>
        @endauth
    </span>
</header>
<hr>

<style>
    header {
        display: flex;
        padding: 16px 0px;
    }
    header form {
        display: inline;
        margin: 0;
    }
    header nav {
        display: flex;
        gap: 14px;
    }
</style>
