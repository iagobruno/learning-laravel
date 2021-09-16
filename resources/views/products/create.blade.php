@extends('layouts.main')

@section('title', 'Criar novo produto')

@section('content')
    <h1>Criar novo produto</h1>

    @include('products.partials.product-form', [
        'formMethod' => 'POST',
        'formAction' => route('products.store'),
        'buttonText' => 'Publicar produto'
    ])
@endsection
