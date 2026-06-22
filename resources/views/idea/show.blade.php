<x-layout>
    <div class="py-8  mx-auto">

        <div class="flex justify-between">
            <a href="{{ route('idea.index') }}" class="flex items-center gap-x-2 text-sm font-medium">
                <x-icons.arrow-back/>
                Back to ideas.
            </a>
            <div class="flex items-center gap-x-2">
                <button class="btn btn-outlined">
                    <x-icons.external/>Edit</button>
                <form action="{{ route('idea.destroy', $idea) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outlined text-red-500">Delete</button>
                </form>
            </div>
        </div>
        <h1 class="font-bold text-4xl">{{$idea->title}}</h1>
    </div>
    <x-card class="mt-6">
        <div class="text-foreground max-w-none cursor-pointer">{{$idea->description}}</div>
    </x-card>
</x-layout>
