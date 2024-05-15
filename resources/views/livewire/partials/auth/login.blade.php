<div x-cloak x-data="{ open: false }" @login-modal.window="open = true">
    <div  x-show="open" class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full backdrop-blur-md">
        <form wire:submit.prevent="login" x-transition x-show="open" class="w-full max-w-[460px] ">
            <div @click.away="open = false" class="bg-[#23272F] p-8 w-full rounded-lg space-y-5">

                <!-- Form Field: Email -->
                <x-partials.inputs.primary label="email" inputName="email" svg="heroicon-o-envelope" placeholder="Email" type="email"  />
    
                <!-- Form Field: Password -->
                <x-partials.inputs.password inputname="password" label="Password" />

                <!-- Account Creation Button -->
                <button type="submit" class="text-base font-normal py-2.5 w-full rounded-lg bg-tertiary text-container mt-5 hover:bg-text-primary transition">Sign In</button>
    
                <!-- Link to Switch Modals -->
                <a x-on:click="open = !open; $dispatch('register-modal')" class="block mt-5 text-sm text-center transition cursor-pointer text-text-secondary hover:text-text-primary">Don't have an account?</a>
            </div>
        </form>
    </div>
</div>