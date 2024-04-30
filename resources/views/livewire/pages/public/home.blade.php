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
                            <a wire:navigate href="{{ route('forums', $forum->slug) }}" class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 border rounded-lg bg-container border-input-border">
                                        @svg($forum->icon, 'w-5 h-5')
                                    </div>
                                    <div>
                                        <h4 class="text-base font-semibold">{{ $forum->name }}</h4>
                                        <p class="text-sm font-normal text-text-secondary">{{ $forum->summary }}</p>
                                    </div>
                                </div>

                                @if($forum->threads->count() > 0)
                                <div class="hidden gap-4 md:flex">
                                    <div class="text-end">
                                        <h5 class="text-sm font-medium">{{ $forum->totalThreads() }}</h4>
                                        <p class="text-xs font-normal text-text-secondary">posts</p>
                                    </div>
                                    <div class="w-[1px] rounded-full h-[37px] bg-input-border"></div>
                                    <div class="hidden lg:block w-[240px]">

                                        <h5 class="text-sm font-medium">{{ Str::limit($forum->recentThread()->title, 22, '...') }}</h5>
                                        
                                        <p class="text-xs font-normal text-text-secondary">
                                            <span class="text-text-primary">{{ $forum->recentThread()->user->username }}</span>, {{ $forum->recentThread()->created_at->diffForHumans() }}
                                        </p>     
                                                                           
                                    </div>
                                </div>
                                @endif
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
