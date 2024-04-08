<div>
    <label class="text-sm font-medium" for="password">{{ ucfirst($label) }}</label>
    <div x-data="{ reveal: false }" class="primary-input-container">
        @svg('heroicon-o-lock-closed', 'h-5 text-primary')
        <input required :type="reveal ? 'text' : 'password'"
            name="{{ $isConfirmation ? 'password_confirmation' : 'password' }}"
            wire:model="{{ $isConfirmation ? 'password_confirmation' : 'password' }}"
            class="flex-1 focus:ring-0 py-2.5 px-2.5 bg-input outline-none border-none text-sm font-medium"
            placeholder="{{ ucfirst($label) }}">
        <button type="button" x-on:click="reveal = !reveal">
            <template x-if="!reveal">@svg('heroicon-o-eye', 'h-5 ml-3.5 text-primary')</template>
            <template x-if="reveal">@svg('heroicon-o-eye-slash', 'h-5 ml-3.5 text-primary')</template>
        </button>
    </div>

    @error($label) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>
