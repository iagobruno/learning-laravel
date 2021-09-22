@php
    $input_id = $id ?? Str::kebab($name);
@endphp
<div
    @class([ 'form-input__wrapper', 'is-invalid' => $errors->has($name) ])
>
    @isset($label)
    <label for="{{ $input_id }}">{{ $label }}</label>
    @endisset

    @if (isset($type) && $type === 'textarea')
        <textarea
            name="{{ $name }}"
            id="input-{{ $input_id }}"
            placeholder="{{ isset($placeholder) ? __($placeholder) : '' }}"
            @class([
                'form-input ' . ($input_classes ?? ''),
                'is-invalid' => $errors->has($name),
            ])
            {{ $input_extra_attrs ?? '' }}
        >{{ $value ?? old($name) ?? '' }}</textarea>
    @else
        <input
            type="{{ $type ?? 'text' }}"
            name="{{ $name }}"
            id="input-{{ $input_id }}"
            value="{{ $value ?? old($name) ?? '' }}"
            placeholder="{{ isset($placeholder) ? __($placeholder) : '' }}"
            @class([
                'form-input ' . ($input_classes ?? ''),
                'is-invalid' => $errors->has($name),
            ])
            {{ $input_extra_attrs ?? '' }}
        />
    @endif

    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
