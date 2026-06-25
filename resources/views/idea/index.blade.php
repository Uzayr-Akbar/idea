<?php

use App\IdeaStatus;

?>

<x-layout.layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">
                Ideas
            </h1>
            <p class="text-muted-foreground text-sm mt-2">
            <p> Capture your thoughts. Make a plan.</p>

            <x-card is="button" type="button" x-data @click="$dispatch('open-modal', 'create-idea')"
                    class="mt-10 cursor-pointer h-32 w-full text-left">
                <p>Whats the idea?</p>
            </x-card>
        </header>
        <div class="mt-10 text-muted-foreground">
            <div class="mb-3 space-x-2">
                <a href="/ideas" class="btn {{ $isFiltered ? 'btn-outlined' : '' }}">All
                    <span class="text-xs pl-3">{{ $statusCount['all'] }}</span>
                </a>
                @foreach (App\IdeaStatus::cases() as $status)
                    <a
                        href="/ideas?status={{ $status }}"
                        class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}">{{ $status->label() }}
                        <span class="text-xs pl-3">{{ $statusCount->get($status->value) }}</span>
                    </a>
                @endforeach
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                @forelse($ideas as $idea)
                    <x-card href="{{ route('idea.show', $idea) }}">
                        <h3 class="text-foreground text-lg">{{ $idea->title }}</h3>
                        <x-status-label class="mt-7"
                                        status="{{ $idea->status }}">{{ $idea->status->label() }}</x-status-label>
                        <div class="mt-5 line-clamp-3">{{ $idea->description }}</div>
                        <div class="mt-4"> {{ $idea->created_at->diffForHumans() }}</div>
                    </x-card>
                @empty
                    <x-card>
                        <p>No ideas. Start creating now!!!</p>
                    </x-card>
                @endforelse
            </div>
            <!-- Create-idea-modal -->

            <x-modal name="create-idea"
                     title="Create Idea"
                     class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto">
                <form x-data="{status: 'pending'}" action="{{ route('idea.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="space-y-6">
                        <x-form.field
                            label="Title"
                            name="Title"
                            placeholder="Enter an idea for your title"
                            autofocus
                        />
                        <div class="flex gap-x-3">
                            @foreach(IdeaStatus::cases() as $status)
                                <button
                                    type="button"
                                    @click="status = @js($status->value)"
                                    class="btn flex-1 h-10"
                                    :class="{'btn-outlined': status !== @js($status->value)}">
                                    {{$status->label()}}
                                </button>
                            @endforeach

                            <input type="hidden" name="status" :value=status>
                        </div>

                        <x-form.field
                            label="Description"
                            name="Description"
                            placeholder="Enter an idea for your description"
                        />


                    </div>
                </form>
            </x-modal>
        </div>
    </div>
</x-layout.layout>
