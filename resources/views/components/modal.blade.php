@props(['name', 'title'])

<div
    x-data="{ show: {{$errors->any() ? 'true' : 'false'}}, name: @js($name, JSON_THROW_ON_ERROR) }"
    @open-modal.window="$event.detail === name ? show = true : show = false"
    x-show="show"
    @keydown.escape.window="show = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs"
    x-transition:enter="duration-200 ease-out"
    x-transition:enter-start="opacity-0 -translate-y-4 -translate-x-4"
    x-transition:enter-end="opacity-100"
    x-transition:leave="duration-150 ease-in"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 -translate-y-4 -translate-x-4"
    style="display: none;"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-{{ $name }}-title"
    :aria-hidden="!show"
    tabindex="-1">
    <x-card @click.away="show = false" class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto">
        <div class="justify-between flex items-center mb-4">
            <h2 id="modal-{{ $name }}-title" class="text-xl font-bold text-white">{{ $title }}</h2>
            <button @click="show = false" aria-label="close modal">
                <x-icons.close/>
            </button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </x-card>
</div>
