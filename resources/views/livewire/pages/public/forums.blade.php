<div>
    <div class="container items-center justify-between mx-auto mt-8 md:flex">
        <x-partials.panel.page-title title='{{ $forum->name }}' description='{{ $forum->summary }}' />

            @auth
            <a wire:navigate href="{{ route('forums.create-thread', $forum->slug) }}"
                class="px-3 py-2 mt-4 rounded-md bg-primary text-background">Create Thread</a>
            @endauth
    </div>
</div>
