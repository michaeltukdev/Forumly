<div class="container">
    <div class="grid md:grid-cols-[3.3fr_1fr] gap-6 mt-8">
        @foreach ($forumCategories as $category)
            <div class="rounded-lg bg-container bg-opacity-60">
                <div class="px-8 py-5 border-b border-input">
                    <h4 class="text-base font-semibold">{{ $category->name }}</h4>
                    <p class="mt-2 text-sm font-normal text-text-secondary">{{ $category->summary }}</p>
                </div>
                <div class="p-8">
                </div>
            </div>
            <div>

            </div>
        @endforeach
    </div>
</div>
