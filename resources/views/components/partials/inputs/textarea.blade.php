<div>
    <label class="text-sm font-medium" for="{{ $label }}">{{ ucfirst($label) }}</label>

    <textarea required class="w-full mt-2 rounded-lg primary-input" wire:model.blur="{{ $label }}" placeholder="{{ $placeholder }}"></textarea>

    @error($label) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>