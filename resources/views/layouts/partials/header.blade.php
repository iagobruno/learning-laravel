<header>
    <nav>
        <a href="/">Página inicial</a>
        <a href="{{ route('products.index') }}">Produtos</a>
        @can('create', \App\Models\Product::class)
            <form action="{{ route('products.create') }}" method="get">
                <button type="submit">Criar produto</button>
            </form>
        @endcan
    </nav>

    <span style="margin-left: auto;">
        <a href="/telescope" target="_blank" style="margin-right: 16px;">Telescope</a>

        @auth
            Olá {{ auth()->user()->name }}!
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Sair</button>
            </form>
        @else
            <form action="{{ route('auth.redirect') }}" method="get">
                <button type="submit">Fazer login</button>
            </form>
        @endauth
    </span>
</header>
<hr>

<style>
    header {
        display: flex;
        align-items: center;
        padding: 20px 0px;
    }
    header form {
        display: inline;
        margin: 0;
    }
    header nav {
        display: flex;
        align-items: center;
        gap: 14px;
    }
</style>
