<div>
    <div class="container items-center justify-between mx-auto mt-8 md:flex">
        <x-partials.panel.page-title title='{{ $forum->name }}' description='{{ $forum->summary }}' />

        @auth
            <a wire:navigate href="{{ route('forums.create-thread', $forum->slug) }}"
                class="px-3 py-2 mt-4 rounded-md bg-primary text-background">Create Thread</a>
        @endauth
    </div>

    <div class="container mt-8">
        <div class="flex items-end gap-4">
            <x-partials.inputs.primary inputName="title" placeholder="Search for threads in {{ $forum->name }}" type="text" />
            <button class="px-10 py-2.5 text-sm rounded-lg font-sm bg-tertiary hover:bg-text-primary border border-tertiary text-background h-fit">Search</button>
        </div>
    </div>
</div>
