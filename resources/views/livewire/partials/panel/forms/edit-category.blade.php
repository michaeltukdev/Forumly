<form wire:submit.prevent='update'>
    <div class="rounded-lg bg-container bg-opacity-60">
        <div class="px-8 py-5 border-b border-input">
            <h4 class="text-base font-semibold">Create Category</h4>
            <p class="mt-2 text-sm font-normal text-text-secondary">Create a forum category below.</p>
        </div>
        <div class="grid grid-cols-2 gap-5 p-8">

            <x-partials.inputs.primary inputName="name" label="name" placeholder="Category Name" type="text" />

            <x-partials.inputs.primary inputName="slug" label="slug" placeholder="Category Slug" type="text" />

            <x-partials.inputs.textarea label="summary" placeholder="Enter your category summary..." />

        </div>
    </div>

    <div class="flex items-center gap-3 mt-4">
        <button type="submit" class="py-2 bg-primary hover:bg-secondary transition px-2.5 rounded-md text-background">Save Category</button>

        <button type="button" wire:click="delete" class="py-2.5 bg-red-400 hover:bg-red-500 transition duration-300 px-2.5 rounded-md text-white flex items-center leading-none">
            @svg('heroicon-o-trash', 'h-5 w-5')
        </button>

    </div>

</form>
