<nav x-cloak @click.outside="open = false" x-data="{ open: false }" class="py-8 transition-all md:bg-transparent bg-container bg-opacity-60" x-transition :class="{'bg-opacity-80 shadow-lg': open, 'bg-opacity-100': !open }">
    <div class="container flex items-center justify-between px-4 mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center gap-8">
            <div class="flex justify-start">
                <img class="h-8" src="{{ asset('assets/branding/logowithname.png') }}" alt="{{ env('APP_NAME') }}">
            </div>
    
            <ul class="items-center hidden gap-8 md:flex">
                <li>
                    <a href="{{ route('home') }}" class="nav-link" wire:navigate.hover>Home</a>
                </li>
                <li>
                    <a href="#" class="nav-link" wire:navigate.hover>Members</a>
                </li>
                <li>
                    <a href="#" class="nav-link" wire:navigate.hover>GitHub</a>
                </li>
            </ul>
    
        </div>

        <ul class="items-center hidden gap-3 md:flex">
            @guest
            <li  @click="$dispatch('login-modal')">
                <a href="#" class=" nav-link flex gap-2.5 bg-container py-2.5 px-6 rounded-lg hover:bg-input transition hover:text-text-primary transition">@svg('heroicon-o-user', 'w-4') Sign In</a>
            </li>
            <li @click="$dispatch('register-modal')">
                <a href="#" class=" text-background flex gap-2.5 bg-tertiary py-2.5 px-6 rounded-lg hover:bg-text-primary transitio transition">@svg('heroicon-s-user', 'w-4') Sign Up</a>
            </li>
            @endguest
            
            @auth
            <li class="relative flex items-center gap-2" x-data="{ open: false }">
                <img src="{{ asset('assets/branding/logowithoutname.png') }}" alt="{{ auth()->user()->username }}" class="w-6 w-10 rounded">
                <a x-on:click="open = !open" class="flex items-center gap-1 cursor-pointer nav-link">{{ auth()->user()->username }} <span :class="{ 'rotate-180': open }"> @svg('heroicon-o-chevron-down', 'h-4') </span></a>
                
                @livewire('partials.dropdown')
            </li>
            @endauth
        </ul>

        <button @click="open = !open" class="flex items-center md:hidden">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{'hidden': open, 'block': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16 M4 12h16 M4 18h16" />
                <path :class="{'block': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div x-show="open"     x-transition:enter="transition ease-out duration-300" 
    x-transition:enter-start="transform opacity-0 scale-95" 
    x-transition:enter-end="transform opacity-100 scale-100" 
    x-transition:leave="transition ease-in duration-300" 
    x-transition:leave-start="transform opacity-100 scale-100" 
    x-transition:leave-end="transform opacity-0 scale-95":class="{'block': open, 'hidden': !open}" class="mt-6 md:hidden">
        <ul class="px-4 pt-2 pb-4 space-y-5 sm:px-6 lg:px-8">
            <a href="#" class="block nav-link" wire:navigate.hover>Home</a>
            <a href="#" class="block nav-link" wire:navigate.hover>Members</a>
            <a href="#" class="block nav-link" wire:navigate.hover>GitHub</a>
        </ul>
        <ul class="flex items-center gap-3 px-4 mt-4 sm:px-6 lg:px-8">
            @guest
            <li @click="$dispatch('login-modal'); open = false" class="w-full">
                <a href="#" class=" w-full justify-center nav-link flex gap-2.5 bg-input py-2.5 px-6 rounded-lg hover:bg-input-border transition hover:text-text-primary transition">@svg('heroicon-o-user', 'w-4') Sign In</a>
            </li>
            <li @click="$dispatch('register-modal'); open = false" class="w-full">
                <a href="#" class=" w-full justify-center text-background flex gap-2.5 bg-tertiary py-2.5 px-6 rounded-lg hover:bg-text-primary transitio transition">@svg('heroicon-s-user', 'w-4') Sign Up</a>
            </li>
            @endguest

            @auth
            <li class="relative flex items-center gap-2" x-data="{ open: false }">
                <img src="{{ asset('assets/branding/logowithoutname.png') }}" alt="{{ auth()->user()->username }}" class="w-6 w-10 rounded">
                <a x-on:click="open = !open" class="flex items-center gap-1 cursor-pointer nav-link">{{ auth()->user()->username }} <span :class="{ 'rotate-180': open }"> @svg('heroicon-o-chevron-down', 'h-4') </span></a>
                
                @livewire('partials.dropdown')
            </li>
            @endauth
        </ul>
    </div>
</nav>
