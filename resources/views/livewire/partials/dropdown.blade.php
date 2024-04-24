<div x-show="open" x-on:click.away="open = false" x-transition
    class="absolute left-0 md:left-auto md:right-0 w-[150px] p-4 border rounded-lg shadow-lg bg-container border-input-border top-10">
    <ul class="w-full space-y-3">
        <li>
            <a href="#" class="block text-sm transition text-text-secondary hover:text-text-primary"
                wire:navigate>Profile</a>
        </li>
        <li>
            <a href="#" class="block text-sm transition text-text-secondary hover:text-text-primary"
                wire:navigate>Settings</a>
        </li>
        @can('panel access')
            <li>
                <a href="{{ route('panel') }}" class="block text-sm transition text-text-secondary hover:text-text-primary"
                    wire:navigate>Control Panel</a>
            </li>
        @endcan
        <li>
            <a href="{{ route('logout') }}" class="block text-sm text-red-300 transition hover:text-red-400"
                wire:navigate>Logout</a>
        </li>
    </ul>
</div>
