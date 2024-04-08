<div>
    <label class="text-sm font-medium" for="{{ $label }}">{{ ucfirst($label) }}</label>
    <div class="primary-input-container">
        @svg($svg, 'h-5 text-primary')
        <input required type="{{ $type }}" class="primary-input" wire:model.blur="{{ $label }}" placeholder="{{ $placeholder }}">
    </div>
    @error($label) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>