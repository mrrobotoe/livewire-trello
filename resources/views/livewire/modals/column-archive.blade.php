<x-modal-wrapper title="Archive columns">
    <div class="max-h-96 space-y-2 overflow-y-auto">
        @forelse ($columns as $column)
            <div
                class="flex items-center justify-between rounded-lg border border-gray-200 px-3 py-2"
            >
                <div>
                    {{ $column->title }}
                </div>
                <button
                    wire:click="unarchiveColumn({{ $column->id }})"
                    class="text-sm text-gray-500"
                >
                    Put back
                </button>
            </div>
        @empty
            <p>You have no archive columns</p>
        @endforelse
    </div>
</x-modal-wrapper>
