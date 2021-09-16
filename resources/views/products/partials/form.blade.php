<form action="{{ $formAction }}" method="POST">
    @method($formMethod)
    @csrf

    <label>
        <strong>Título:</strong>
        <input
          type="text"
          name="title"
          value="{{ old('title') ?? $product->title ?? '' }}"
          required
          maxlength="255"
        >
        @error('title') <div class="error-message">{{ $message }}</div> @enderror
    </label>

    <label>
        <strong>Preço:</strong>
        <input
          type="number"
          name="price"
          value="{{ old('price') ?? $product->price ?? '0' }}"
          required
          min="0"
          step=".01"
        >
        @error('price') <div class="error-message">{{ $message }}</div> @enderror
    </label>

    <label>
        <strong>Quantidade:</strong>
        <input
          type="number"
          name="qty"
          value="{{ old('qty') ?? $product->qty ?? '0' }}"
          min="0"
          required
        >
        @error('qty') <div class="error-message">{{ $message }}</div> @enderror
    </label>

    <label>
        <strong>Descrição:</strong>
        <textarea
          name="description"
          cols="60"
          rows="10"
        >{{ old('description') ?? $product->description ?? '' }}</textarea>
        @error('description') <div class="error-message">{{ $message }}</div> @enderror
    </label>

    <button type="submit">{{ $buttonText ?? 'Salvar' }}</button>
</form>

<style>
    label,
    strong {
        display: block;
    }
    label {
        margin-bottom: 14px;
    }
    .error-message {
        color: red;
    }
</style>
