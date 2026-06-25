@props(['label' => false, 'name', 'type' => 'text'])
<div class="space-y-2">

    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    @if($type === 'textarea')
        <textarea name="{{ $name }}"
                  id="{{ $name }}"
                  class="textarea  mt-3" {{ $attributes }}
        >{{ old($name) }}</textarea>

    @else
        <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}" class="input  mt-3" value="{{ old($name) }}"
            {{ $attributes }}>

    @endif
    @error($name)
    <p class="error">
        {{ $message }}
    </p>
    @enderror
</div>
