<x-layout.layout>
    Hello world
    @if ( session('success'))
        <p class="alert">
            {{ session('success') }}
        </p>
    @endif
</x-layout.layout>
