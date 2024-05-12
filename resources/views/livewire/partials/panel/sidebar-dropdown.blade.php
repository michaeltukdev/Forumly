<div x-data="{ open: false }">
    <button x-on:click="open = !open"
        class="p-2.5 w-full hover:bg-input rounded-lg flex items-center justify-between text-text-secondary">
        <span class="flex gap-2">@svg($icon, 'h-6') {{ $label }} </span>

        <span :class="{ 'rotate-180': open }">
            @svg('heroicon-o-chevron-down', 'h-4')
        </span>
    </button>

    <div x-transition.scale.origin.top x-cloak x-show="open" class="py-2.5 px-[50px] sidebar-links space-y-4 relative">
        @foreach($items as $label => $route)
            <a wire:navigate.hover class="block text-sm transition text-text-secondary hover:text-primary" href="{{ $route }}">{{ $label }}</a>
        @endforeach
    </div>
</div>