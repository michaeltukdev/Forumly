<div>
    <label class="text-sm font-medium" for="{{ $label }}">{{ ucfirst($label) }}</label>
    <div class="primary-input-container" style="@if(!$svg) padding-left: 0.2rem @endif">
        @if($svg) @svg($svg, 'h-5 text-primary') @endif
        <input required type="{{ $type }}" class="primary-input " wire:model.blur="{{ $label }}" placeholder="{{ $placeholder }}">
    </div>
    @error($label) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>