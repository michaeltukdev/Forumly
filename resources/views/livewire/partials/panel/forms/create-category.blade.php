<form wire:submit.prevent='create'>
    <div class="rounded-lg bg-container bg-opacity-60">
        <div class="px-8 py-5 border-b border-input">
            <h4 class="text-base font-semibold">Create Category</h4>
            <p class="mt-2 text-sm font-normal text-text-secondary">Create a forum category below.</p>
        </div>
        <div class="grid grid-cols-2 gap-5 p-8">
            
            <x-partials.inputs.primary label="name" placeholder="Category Name" type="text"  />
            
            <x-partials.inputs.primary label="slug" placeholder="Category Slug" type="text"  />

            <x-partials.inputs.textarea label="summary" placeholder="Enter your category summary..." />
        
        </div>
    </div>

    <button type="submit" class="py-2 bg-primary px-2.5 rounded-md mt-4 text-background">Create Category</button>
</form>