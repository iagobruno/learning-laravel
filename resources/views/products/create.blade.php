@extends('layouts.main')

@section('title', 'Criar novo produto')

@section('content')
    <h1>Criar novo produto</h1>

    @component('components.product-form', [
        'formMethod' => 'POST',
        'formAction' => route('products.store'),
        'buttonText' => 'Publicar produto'
    ])
    @endcomponent
@endsection
