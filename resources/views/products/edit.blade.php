@extends('layouts.main')

@section('title', 'Editar produto #' . $product->id)

@section('content')
    <h1>Editar produto</h1>

    @include('products.partials.form', [
        'formMethod' => 'PATCH',
        'formAction' => route('products.update', $product->slug),
        'buttonText' => 'Salvar produto'
    ])
@endsection
