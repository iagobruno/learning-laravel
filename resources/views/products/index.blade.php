@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <h1>Produtos</h1>

    @can('create', \App\Models\Product::class)
        <form action="{{ route('products.create') }}" method="get">
            <button type="submit">Criar produto</button>
        </form>
    @endcan

    <ul>
        @forelse ($products as $product)
            <li>
                <a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
                - R$ {{ $product->formatedPrice }}
            </li>
        @empty
            Nenhum produto encontrado
        @endforelse
    </ul>
@endsection
