<form wire:submit.prevent='create'>
    <div class="rounded-lg bg-container bg-opacity-60">
        <div class="px-8 py-5 border-b border-input">
            <h4 class="text-base font-semibold">Create Category</h4>
            <p class="mt-2 text-sm font-normal text-text-secondary">Create a forum category below.</p>
        </div>
        <div class="grid grid-cols-2 gap-5 p-8">
            <div>
                <label for="name" class="text-sm text-text-secondary">Category Name</label>
                <input type="text" wire:model.live="name" class="w-full px-3 py-2 mt-2 text-sm rounded-md bg-input bg-opacity-60 text-text-secondary focus:border-input-border border-input-border" placeholder="Category Name">
                @error('name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="slug" class="text-sm text-text-secondary">Category Slug</label>
                <input type="text" wire:model.live="slug" class="w-full px-3 py-2 mt-2 text-sm rounded-md bg-input bg-opacity-60 text-text-secondary focus:border-input-border border-input-border" placeholder="Category Name">
                @error('slug') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-2">
                <label for="summary" class="text-sm text-text-secondary">Category summary</label>
                <textarea wire:model.live="summary" class="w-full px-3 py-2 mt-2 text-sm rounded-md bg-input bg-opacity-60 text-text-secondary focus:border-input-border border-input-border"></textarea>
                @error('summary') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="py-2 bg-primary px-2.5 rounded-md mt-4 text-background">Create Category</button>
</form>