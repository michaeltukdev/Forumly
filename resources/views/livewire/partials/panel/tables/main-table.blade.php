<div>
    <div>
        <form wire:submit.prevent>
            <input wire:model.live="search" placeholder="Search..." class="mt-4 text-sm border rounded shadow-none bg-input border-input-border focus:ring-0 focus:outline-none" type="text">
            @if($sortColumn)
            <select wire:model.live="sortDirection" class="mt-4 text-sm border rounded shadow-none bg-input border-input-border focus:ring-0 focus:outline-none">
                <option value="desc">Descending</option>
                <option value="asc">Ascending</option>
            </select>
            @endif
        </form>
    </div>
    <div class="mt-4 border rounded-lg border-input-border">
        <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full text-sm divide-y-2 divide-input-border bg-container">
                <thead class="text-left">
                    <tr>
                        @foreach($columns as $key => $label)
                            <th class="table-title">{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-input-border">
                    @foreach ($data as $item)
                        <tr>
                            @foreach($columns as $key => $label)
                                <td class="table-item">
                                    @if(array_key_exists($key, $specialFormats) && $specialFormats[$key] === 'diffForHumans')
                                        {{ $item->$key->diffForHumans() }}
                                    @else
                                        {{ $item->$key }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
        <div class="flex items-center justify-between px-4 py-2 border-t rounded-b-lg border-input-border">
            Showing Results
            {{ $data->links() }}
        </div>
    </div>
</div>
