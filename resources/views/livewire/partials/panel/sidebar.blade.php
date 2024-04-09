<div x-data="{ open: window.innerWidth >= 768 }" x-init="() => { window.addEventListener('resize', () => { open = window.innerWidth >= 768; }); }" @sidebar.window="open = !open":class="{ '-translate-x-full': !open }"
    class="absolute inset-y-0 left-0 z-10 w-64 space-y-6 text-white transition-transform duration-300 ease-in-out transform border-r bg-container border-input-border md:relative">
    <div class="px-4 py-[23.5px] border-b border-input-border">
        <img class="w-24" src="{{ asset('assets/branding/logowithname.png') }}">
    </div>
    
    <nav class="px-4 space-y-2">
        <span class="text-xs tracking-wider uppercase font-base text-text-secondary">Navigation</span>
        <a href="#" class="p-2.5 hover:bg-input rounded-lg flex items-center gap-2 text-base text-text-secondary">
            @svg('heroicon-o-squares-2x2', 'h-6')
            Overview
        </a>

        @can('manage users')
            <div x-data="{ open: false }">
                <button x-on:click="open = !open"
                    class="p-2.5 w-full hover:bg-input rounded-lg flex items-center justify-between text-text-secondary">
                    <span class="flex gap-2">@svg('heroicon-o-user', 'h-6') Users </span>

                    <span :class="{ 'rotate-180': open }">
                        @svg('heroicon-o-chevron-down', 'h-4')
                    </span>
                </button>

                <div x-transition.scale.origin.top x-cloak x-show="open"
                    class="py-2.5 px-[50px] sidebar-links space-y-4 relative">
                    <a class="block text-sm transition text-text-secondary hover:text-primary" href="#">Users</a>
                    <a class="block text-sm transition text-text-secondary hover:text-primary" href="#">Banned Users</a>
                </div>
            </div>
        @endcan
    </nav>
</div>
