<div x-cloak x-data="{ open: false }"  @register-modal.window="open = true">
    <div x-show="open" class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full backdrop-blur-md">
        <div x-transition x-show="open" class="w-full max-w-[460px] ">
            <form wire:submit.prevent="register" @submit.prevent="console.log('submitted')" @click.away="open = false" class="bg-[#23272F] max-w-[460px] p-8 w-full rounded-lg space-y-5">
            
                <!-- Form Field: Username -->
                <x-partials.inputs.primary inputName="username" label="username" svg="heroicon-o-user" placeholder="Username"  />
    
                <!-- Form Field: Email -->
                <x-partials.inputs.primary inputName="email" label="email" svg="heroicon-o-envelope" placeholder="Email" type="email"  />
    
                <!-- Form Field: Password -->
                <x-partials.inputs.password inputName="password" label="password" />
    
                <!-- Form Field: Password Confirmation -->
                <x-partials.inputs.password inputName="password_confirmation" label="Password Confirmation" isConfirmation />
    
                <!-- Terms of Service Checkbox -->
                <div class="flex items-center gap-2 mt-5">  
                    <input wire:model="legal" id="default-checkbox" type="checkbox" value="" class="rounded-md bg-input hover:bg-primary checked:hover:bg-secondary checked:focus:bg-secondary border-input-border checked:bg-primary focus:bg-primary ring-0 focus:ring-0 focus:outline-none">
                    <label for="legal" class="text-sm font-medium text-text-secondary">I agree with the <a href="{{ route('terms') }}" target="_blank" class="text-primary hover:text-secondary">Terms of Service</a> & <a href="{{ route('privacy') }}" target="_blank" class="text-primary hover:text-secondary">Privacy Policy</a></label>
                </div>
                @error('legal') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
    
                <!-- Account Creation Button -->
                <button type="submit" class="mt-5 w-full py-2.5 rounded-lg bg-tertiary text-base font-normal text-container hover:bg-text-primary transition">Create Account</button>
    
                <!-- Link to Switch Modals -->
                <a x-on:click="open = false; $dispatch('login-modal')" class="block mt-5 text-sm text-center transition cursor-pointer text-text-secondary hover:text-text-primary">Have an account?</a>
            </form>
        </div>
    </div>
</div>