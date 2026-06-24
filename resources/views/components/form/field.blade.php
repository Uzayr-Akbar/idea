@props(['label', 'name', 'type' => 'text'])
<div class="space-y-2">
    <label for="{{ $name }}">{{ $label }}</label>
    <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}" class="input  mt-3" value="{{ old($name) }}"
        {{ $attributes->merge(['class' => 'input  mt-3']) }}>

    @error($name)
    <p class="error">
        {{ $message }}
    </p>
    @enderror
</div>
