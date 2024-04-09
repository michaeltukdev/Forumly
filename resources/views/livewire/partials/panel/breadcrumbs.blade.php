<div class="breadcrumbs">
    <ol class="flex overflow-hidden transition border rounded-lg text-text-secondary border-input-border">
        <li class="flex items-center">
            <a href="{{ route('panel') }}" class="flex h-10 items-center gap-1.5 bg-input-border px-4 transition hover:text-primary">
                @svg('heroicon-s-home', 'w-4 h-4')

                <span class="ms-1.5 text-xs font-medium"> Panel </span>
            </a>
        </li>

        <li class="relative flex items-center z-1">
            <span
                class="absolute inset-y-0 -start-px h-10 w-4 bg-input-border [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
            </span>

            @foreach($path as $path => $url)
                <a href="{{ route($url) }}" class="flex items-center h-10 text-xs font-medium transition bg-input pe-4 ps-8 hover:text-primary">{{ $path }}</a>
            @endforeach
        </li>
    </ol>
</div>