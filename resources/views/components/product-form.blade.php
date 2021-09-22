<form action="{{ $formAction }}" method="POST">
    @method($formMethod)
    @csrf

    @component('components.input', [
        'type' => 'text',
        'name' => 'title',
        'label' => "Título",
        'value' => old('title') ?? $product->title ?? '',
    ])
        @slot('input_extra_attrs')
        required
        maxlength="255"
        autocomplete="off"
        autofocus
        @endslot
    @endcomponent

    @component('components.input', [
        'type' => 'number',
        'name' => 'price',
        'label' => "Preço",
        'value' => old('price') ?? $product->price ?? '0,00',
    ])
        @slot('input_extra_attrs')
        required
        min="0"
        step=".01"
        @endslot
    @endcomponent

    @component('components.input', [
        'type' => 'number',
        'name' => 'qty',
        'label' => "Quantidade",
        'value' => old('qty') ?? $product->qty ?? '0',
    ])
        @slot('input_extra_attrs')
        required
        min="0"
        @endslot
    @endcomponent

    @component('components.input', [
        'type' => 'textarea',
        'name' => 'description',
        'label' => "Descrição",
        'value' => old('description') ?? $product->description ?? '',
        'placeholder' => 'Descrição do produto...'
    ])
        @slot('input_extra_attrs')
        cols="60"
        rows="10"
        @endslot
    @endcomponent

    <button type="submit">{{ $buttonText ?? 'Salvar' }}</button>
</form>

<style>
    .form-input__wrapper {
        margin-bottom: 14px;
    }
    label{
        display: block;
    }
    .invalid-feedback {
        color: red;
    }
    input.is-invalid,
    textarea.is-invalid {
        border: 1px solid red;
    }
</style>
