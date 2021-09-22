@extends('layouts.main')

@section('title', 'Editar produto #' . $product->id)

@section('content')
    <h1>Editar produto</h1>

    @component('components.product-form', [
        'formMethod' => 'PATCH',
        'formAction' => route('products.update', $product->slug),
        'buttonText' => 'Salvar produto',
        'product' => $product,
    ])
    @endcomponent
@endsection
