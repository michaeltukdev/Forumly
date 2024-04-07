<div>
    <label class="text-sm font-medium" for="{{ $label }}">{{ ucfirst($label) }}</label>
    <div class="primary-input-container">
        @svg($svg, 'h-5 text-primary')
        <input required type="{{ $type }}" class="primary-input" wire:model="{{ $label }}" placeholder="{{ $placeholder }}">
    </div>
</div>