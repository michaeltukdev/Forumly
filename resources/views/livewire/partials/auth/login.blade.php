<div x-cloak="open = false" x-data="{ open: false }"  @login-modal.window="open = true">
    <div x-transition x-show="open" class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-20">
        <div @click.away="open = false" class="bg-[#23272F] max-w-[460px] p-8 w-full rounded-lg">

            <div>
                <label class="text-sm font-medium" for="email">Email</label>
                <div class="flex items-center px-3.5 mt-2.5 w-full rounded-md text-sm font-medium bg-input border border-input-border ">
                    @svg('heroicon-o-envelope', 'h-5 text-primary')
                    <input required type="email" class="flex-1 py-2.5 px-2.5 bg-input outline-none border-none text-sm font-medium" placeholder="Email">
                </div>
            </div>      

            <div class="mt-5">
                <label class="text-sm font-medium" for="password">Password</label>
                <div x-data="{ reveal: false }" class="flex items-center px-3.5 mt-2.5 w-full rounded-md text-sm font-medium bg-input border border-input-border">
                    @svg('heroicon-o-lock-closed', 'h-5 text-primary')
                    <input required :type="reveal ? 'text' : 'password'" name="password" wire:model="password" class="flex-1 py-2.5 px-2.5 bg-input outline-none border-none text-sm font-medium" placeholder="Password">
                    <button x-on:click="reveal = ! reveal">
                        <template x-if="!reveal">
                            @svg('heroicon-o-eye', 'h-5 ml-3.5 text-primary')
                        </template>
                        <template x-if="reveal">
                            @svg('heroicon-o-eye-slash', 'h-5 ml-3.5 text-primary')
                        </template>
                    </button>
                </div>
            </div>      

            <button class="text-base font-normal py-2.5 w-full rounded-lg bg-tertiary text-container mt-5 hover:bg-text-primary transition">Sign In</button>

            <a x-on:click="open = !open; $dispatch('register-modal')" class="block mt-5 text-sm text-center transition cursor-pointer text-text-secondary hover:text-text-primary">Don't have an account?</a>
    </div>
</div>