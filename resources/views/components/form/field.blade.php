@props(['label' => false, 'name', 'type' => 'text'])
<div class="space-y-2">

    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    @switch($type)
        @case('textarea')
            <textarea name="{{ $name }}"
                      id="{{ $name }}"
                      class="textarea  mt-3" {{ $attributes }}>{{ old($name) }}
            </textarea>
            @break

        @default
            <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}" class="input  mt-3" value="{{ old($name) }}"
                {{ $attributes }}>
    @endswitch
    <x-form.error name="{{ $name }}"/>
</div>
