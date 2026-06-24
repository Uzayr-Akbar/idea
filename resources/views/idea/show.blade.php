<x-layout>
    <div class="py-8  mx-auto">

        <div class="flex justify-between">
            <a href="{{ route('idea.index') }}" class="flex items-center gap-x-2 text-sm font-medium">
                <x-icons.arrow-back/>
                Back to ideas.
            </a>
            <div class="flex items-center gap-x-2">
                <button class="btn btn-outlined">
                    <x-icons.external/>
                    Edit
                </button>
                <form action="{{ route('idea.destroy', $idea) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outlined text-red-500">Delete</button>
                </form>
            </div>
        </div>

        <div class="mt-8 space-y-6">
            <h1 class="font-bold text-4xl">{{$idea->title}}</h1>
            <div class="mt-2 flex gap-x-3 items-center">
                <x-status-label :status="$idea->status->value">{{ $idea->status->label() }}</x-status-label>
                <div class="text-muted-foreground text-sm">{{ $idea->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>
    <x-card href="{{ route('idea.edit', $idea) }}" class="mt-4">
        <div class="text-foreground max-w-none cursor-pointer">{{$idea->description}}</div>
    </x-card>
    <div>
        <h3 class="font-bold text-xl mt-6">
            <div>
                <h3>Links</h3>
                @if($idea->links->count())
                    @foreach ($idea->links as $link)
                        <x-card href="{{$link}}"
                                class="mt-5 text-primary font-medium  flex gap-x-3 items-center">
                            <x-icons.external/> {{ $link }}
                        </x-card>
                    @endforeach
                @endif
            </div>
        </h3>
    </div>
</x-layout>
