<div class="container">
    <div class="grid md:grid-cols-[3.3fr_1fr] gap-6 mt-8">
        @foreach ($forumCategories as $category)
            <div class="rounded-lg bg-container bg-opacity-60">
                <div class="px-8 py-5 border-b border-input">
                    <h4 class="text-base font-semibold">{{ $category->name }}</h4>
                    <p class="mt-2 text-sm font-normal text-text-secondary">{{ $category->summary }}</p>
                </div>
                <div class="p-8 space-y-8">
                    @foreach ($category->forums as $forum)
                        <div>
                            <a wire:navigate href="{{ route('forums', $forum->slug) }}" class="flex items-center gap-4">
                                <div class="p-3 border rounded-lg bg-container border-input-border">
                                    @svg($forum->icon, 'w-5 h-5')
                                </div>
                                <div>
                                    <h4 class="text-base font-semibold">{{ $forum->name }}</h4>
                                    <p class="text-sm font-normal text-text-secondary">{{ $forum->summary }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>

            </div>
        @endforeach
    </div>
</div>
