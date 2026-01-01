<x-modal-wrapper title="Archive columns">
    <div class="max-h-96 overflow-y-auto space-y-2">
        @forelse ($columns as $column)
            <div class="border border-gray-200 rounded-lg px-3 py-2 flex items-center justify-between">
                <div>
                    {{ $column->title }}
                </div>
                <button wire:click="unarchiveColumn({{ $column->id }})" class="text-sm text-gray-500">Put back</button>
            </div>

        @empty
            <p>You have no archive columns</p>

        @endforelse
    </div>
</x-modal-wrapper>
