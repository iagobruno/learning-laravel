@extends('layouts.main')

@section('title', 'Editar produto #' . $product->id)

@section('content')
    <h1>Editar produto</h1>

    <x-product-form
        formMethod="PATCH"
        formAction="{{route('products.update', $product->slug)}}"
        buttonText="Salvar alterações"
        :product="$product"
    />
@endsection
