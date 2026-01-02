<x-modal-wrapper title="Archive cards">
    <div class="max-h-96 space-y-2 overflow-y-auto">
        @forelse ($cards as $card)
            <div
                class="flex items-center justify-between rounded-lg border border-gray-200 px-3 py-2"
            >
                <div>
                    {{ $card->title }}
                </div>
                <button
                    wire:click="unarchiveCard({{ $card->id }})"
                    class="text-sm text-gray-500"
                >
                    Put back
                </button>
            </div>
        @empty
            <p>You have no archive cards</p>
        @endforelse
    </div>
</x-modal-wrapper>
