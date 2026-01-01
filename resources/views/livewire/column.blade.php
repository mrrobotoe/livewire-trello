<div class="w-[260px] self-start bg-white shrink-0 rounded-lg shadow-sm max-h-full flex flex-col">
    <div class="flex justify-between items-center">
        <div
            x-data="{ editing: false }"
            x-on:click.outside="editing = false"
            class="h-8 w-full flex items-center px-4 pr-0 min-w-0"
        >
            <button x-show="!editing" x-on:click="editing = true" x-on:column-updated.window="editing = false" class="text-left w-full font-medium">{{ $column->title }}</button>

            <template x-if="editing">
                <form wire:submit="updateColumn" class="-ml-[calc(theme('margin[1.5]')+1px)] -mt-[calc(theme('margin[0.5]'))]">
                    <x-text-input class="h-8 px-1.5 w-full font-medium" wire:model="editColumnForm.title" x-init="$el.focus()"/>
                </form>
            </template>
        </div>
        <div class="px-3.5 py-3">
            <x-dropdown>
                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-button wire:click="archiveColumn">
                        Archive
                    </x-dropdown-button>
                </x-slot>
            </x-dropdown>
        </div>
    </div>


    <div
        class="p-3 space-y-1 pt-0 overflow-y-auto"
        wire:sortable-group.item-group="{{ $column->id }}"
        wire:sortable-group.options="{ ghostClass: 'opacity-20' }"
    >
        @foreach($cards as $card)
            <div
                wire:key="{{ $card->id }}"
                wire:sortable-group.item="{{ $card->id }}"
                wire:click="$dispatch('openModal', { component: 'modals.edit-card', arguments: { card: {{ $card->id }} } })"
            >
                <livewire:card wire:key="{{ $card->id }}" :card="$card" />
            </div>
        @endforeach
    </div>

    <div
        class="p-3"
        x-data="{ adding: false }"
        x-on:card-created.window="adding = false"
    >
        <template x-if="adding">
            <form wire:submit="createCard" class="">
                <div>
                    <x-input-label for="title" value="Title" class="sr-only"/>
                    <x-text-input id="title" placeholder="Card title" class="w-full h-9" wire:model="createCardForm.title" x-init="$el.focus()" />
                    <x-input-error :messages="$errors->get('createCardForm.title')" />
                </div>

                <div class="flex items-center justify-start space-x-2 mt-2">
                    <x-primary-button>
                        Create
                    </x-primary-button>
                    <x-secondary-button x-on:click="adding = false" class="text-sm">Cancel</x-secondary-button>
                </div>
            </form>
        </template>
        <button x-show="!adding" x-on:click="adding = true" class="px-4 py-1.5 flex items-center space-x-2 rounded-lg hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[1.15rem] -ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            <span>Add a card</span>
        </button>
    </div>
</div>
