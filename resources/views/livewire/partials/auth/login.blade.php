<div x-cloak x-data="{ open: false }"  @login-modal.window="open = true">
    <div x-transition x-show="open" class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-20">
        <div @click.away="open = false" class="bg-[#23272F] max-w-[460px] p-8 w-full rounded-lg space-y-5">

            <!-- Form Field: Email -->
            @livewire('partials.inputs.primary', ['label' => 'email', 'type' => 'email', 'svg' => 'heroicon-o-envelope', 'placeholder' => 'Email'])

            <!-- Form Field: Password -->
            @livewire('partials.inputs.password', ['label' => 'password'])

            <!-- Account Creation Button -->
            <button class="text-base font-normal py-2.5 w-full rounded-lg bg-tertiary text-container mt-5 hover:bg-text-primary transition">Sign In</button>

            <!-- Link to Switch Modals -->
            <a x-on:click="open = !open; $dispatch('register-modal')" class="block mt-5 text-sm text-center transition cursor-pointer text-text-secondary hover:text-text-primary">Don't have an account?</a>
    </div>
</div>