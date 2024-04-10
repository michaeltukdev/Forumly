<div x-data="{ open: window.innerWidth >= 768 }" x-init="() => { window.addEventListener('resize', () => { open = window.innerWidth >= 768; }); }" @sidebar.window="open = !open":class="{ '-translate-x-full': !open }"
    class="absolute inset-y-0 left-0 z-10 w-64 space-y-6 text-white transition-transform duration-300 ease-in-out transform border-r bg-container border-input-border md:relative">
    <div class="px-4 py-[23.5px] border-b border-input-border">
        <img alt="Logo" draggable="false" class="w-24" src="{{ asset('assets/branding/logowithname.png') }}">
    </div>
    
    <nav class="px-4 space-y-2">
        <span class="text-xs tracking-wider uppercase font-base text-text-secondary">Navigation</span>
        <a wire:navigate href="{{ route('panel') }}" class="p-2.5 rounded-lg flex items-center gap-2 text-base text-text-secondary">
            @svg('heroicon-o-squares-2x2', 'h-6')
            Overview
        </a>

        @can('manage users')
            <livewire:partials.panel.sidebar-dropdown label="Users" icon="heroicon-o-user" :items="['Users' => route('panel.users'), 'Add New' => '/users/create']"  />
        @endcan
        
    </nav>
</div>
