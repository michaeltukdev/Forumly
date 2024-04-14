<div>
    <div>
        <form wire:submit.prevent>
            <input wire:model.live.debounce.300ms="search" placeholder="Search username..." class="mt-4 text-sm border rounded shadow-none bg-input border-input-border focus:ring-0 focus:outline-none" type="text">
            <select class="mt-4 text-sm border rounded shadow-none bg-input border-input-border focus:ring-0 focus:outline-none" wire:model.live="sort">
                <option value="most_recent">Most Recent</option>
                <option value="oldest">Oldest User</option>
            </select>
        </form>
    </div>
    <div class="mt-4 border rounded-lg border-input-border">
        <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full text-sm divide-y-2 divide-input-border bg-container">
                <thead class="text-left">
                    <tr>
                        <th class="table-title">Username</th>
                        <th class="table-title">Email</th>
                        <th class="table-title">Roles</th>
                        <th class="table-title">Registered At</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-input-border">

                    @foreach ($users as $user)
                        <tr>
                            <td class="table-title">{{ $user->username }}</td>
                            <td class="table-item">{{ $user->email }}</td>
                            <td class="table-item">
                                @foreach ($user->getRoleNames() as $role)
                                    <span class="tag"> {{ $role }} </span>
                                @endforeach
                            </td>
                            <td class="table-item">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="table-item"><button
                                    class="px-5 py-1 font-medium rounded bg-primary hover:bg-secondary text-container">Edit</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="px-4 py-2 border-t rounded-b-lg border-input-border">
            <ol class="flex items-center justify-between gap-1 text-xs font-medium">
                <p>Showing results</p>

                {{ $users->links() }}
            </ol>
        </div>
    </div>
</div>
