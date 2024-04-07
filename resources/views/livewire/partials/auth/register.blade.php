<div x-cloak="open = false" x-data="{ open: false }"  @register-modal.window="open = true">
    <div x-transition x-show="open" class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-20">
        <div @click.away="open = false" class="bg-[#23272F] max-w-[460px] p-8 w-full rounded-lg">

            <div>
                <label class="text-sm font-medium" for="username">Username</label>
                <div class="flex items-center px-3.5 mt-2.5 w-full rounded-md text-sm font-medium bg-input border border-input-border">
                    @svg('heroicon-o-user', 'h-5 text-primary')
                    <input required type="text" class="flex-1 py-2.5 px-2.5 bg-input outline-none border-none text-sm font-medium" placeholder="Username">
                </div>
            </div>      

            <div class="mt-5">
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

            <div class="mt-5">
                <label class="text-sm font-medium" for="password_confirmation">Confirm Password</label>
                <div x-data="{ reveal: false }" class="flex items-center px-3.5 mt-2.5 w-full rounded-md text-sm font-medium bg-input border border-input-border">
                    @svg('heroicon-o-lock-closed', 'h-5 text-primary')
                    <input required :type="reveal ? 'text' : 'password'" name="password" wire:model="password_confirmation" class="flex-1 py-2.5 px-2.5 bg-input outline-none border-none text-sm font-medium focus:box-shadow-none" placeholder="Password">
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


            <div class="flex items-center gap-2 mt-5">
                <input x-model="terms" id="default-checkbox" type="checkbox" value="" class="rounded-md bg-input hover:bg-primary checked:hover:bg-secondary checked:focus:bg-secondary border-input-border checked:bg-primary focus:bg-primary ring-0 focus:ring-0 focus:outline-none">
                <label class="text-sm font-medium text-text-secondary" for="terms">I agree with the <a href="{{ route('terms') }}" target="_blank" class="transition text-primary hover:text-secondary">Terms of Service</a> & <a href="{{ route('privacy') }}" target="_blank" class="transition text-primary hover:text-secondary">Privacy Policy</a></label>
            </div>

            <button class="text-base font-normal py-2.5 w-full rounded-lg bg-tertiary text-container mt-5 hover:bg-text-primary transition">Create Account</button>

            <a x-on:click="open = !open; $dispatch('login-modal')" class="block mt-5 text-sm text-center transition cursor-pointer text-text-secondary hover:text-text-primary">Have an account?</a>
        </div>
    </div>
</div>