<div>
    <div class="container items-center justify-between mx-auto mt-8 md:flex">
        <x-partials.panel.page-title title='Create Thread' description='Create a thread in {{ $forum->name }}' />
    </div>

    <div class="container mx-auto mt-8">
        <form wire:submit.prevent='create'>
            <div class="rounded-lg bg-container bg-opacity-60">
                <div class="px-8 py-5 border-b border-input">
                    <h4 class="text-base font-semibold">Create Thread</h4>
                    <p class="mt-2 text-sm font-normal text-text-secondary">Create a thread below</p>
                </div>
                <div class="grid grid-cols-2 gap-5 p-8">
                    
                    <x-partials.inputs.primary inputName="title" label="Thread Title" placeholder="Enter a thread title..." type="text"  />
                            
                    <x-partials.inputs.textarea label="content" placeholder="Enter your content..." />
                
                </div>
            </div>
        
            @error('create')<p class="mt-4 text-xs text-red-400">{{ $message }}</p>@enderror

            <button type="submit" class="py-2 bg-primary px-2.5 rounded-md mt-4 text-background">Create Category</button>
        </form>
    </div>
</div>
