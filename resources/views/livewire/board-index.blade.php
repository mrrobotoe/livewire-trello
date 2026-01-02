<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __("Dashboard") }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto grid max-w-7xl grid-cols-3 gap-4 sm:px-6 lg:px-8">
        @foreach ($boards as $board)
            <a
                href="{{ route("boards.show", $board) }}"
                class="flex h-36 items-end overflow-hidden bg-white p-6 text-lg text-gray-900 shadow-sm sm:rounded-lg"
            >
                {{ $board->title }}
            </a>
        @endforeach

        <button
            wire:click="$dispatch('openModal', { component: 'modals.create-board' })"
            class="flex h-36 items-center justify-center space-x-2 overflow-hidden border border-gray-200 bg-neutral-200 p-6 text-lg text-gray-900 shadow-sm hover:bg-neutral-100 sm:rounded-lg"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="-ml-2 size-5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4.5v15m7.5-7.5h-15"
                />
            </svg>
            <span>New board</span>
        </button>
    </div>
</div>
