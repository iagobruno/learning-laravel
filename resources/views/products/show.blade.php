@extends('layouts.main')

@section('title', $product->title)

@section('content')
    <h1>{{ $product->title }}</h1>
    <p>R$ {{ number_format($product->price, 2, ',', ' ') }}</p>
    <p>Estoque: {{ $product->qty }}</p>
    @if ($product->description)
        <p>{{ $product->description }}</p>
    @endif
    <p>Criado por: {{ $product->owner->name }} </p>

    @auth
        @can('update', $product)
        <form action="{{ route('products.edit', $product->slug) }}" method="get">
            <button type="submit">Editar produto</button>
        </form>
        @endcan

        @can('delete', $product)
        <form action="{{ route('products.destroy', $product->slug) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Deletar produto</button>
        </form>
        @endcan
    @endauth
@endsection

<style>
    form {
        display: inline;
        margin-right: 6px;
    }
</style>
