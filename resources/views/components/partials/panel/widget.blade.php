<div class="relative p-6 space-y-4 border rounded-lg border-input-border bg-container">
    <h4 class="text-3xl font-semibold text-text-primary">{{ number_format($value) }}</h4>
    <p class="text-md text-text-secondary">{{ $title }}</p>
    <div class="w-full py-0.5 {{ $color }} rounded"></div>

    @svg($icon, 'h-20 text-input-border opacity-50 absolute top-0 right-6')
</div>