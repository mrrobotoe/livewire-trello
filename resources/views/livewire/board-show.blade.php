<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $board->title }}
            </h2>

            <x-dropdown>
                <x-slot name="trigger">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                        />
                    </svg>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-button
                        x-on:click="Livewire.dispatch('openModal', { component: 'modals.card-archive', arguments: { board: {{ $board->id }} } })"
                    >
                        Archive cards
                    </x-dropdown-button>
                    <x-dropdown-button
                        x-on:click="Livewire.dispatch('openModal', { component: 'modals.column-archive', arguments: { board: {{ $board->id }} } })"
                    >
                        Archive columns
                    </x-dropdown-button>
                </x-slot>
            </x-dropdown>
        </div>
    </x-slot>

    <div class="w-full overflow-x-auto p-6">
        <div
            class="flex h-[calc(theme('height.screen')-65px-73px-theme('padding.16'))] w-max space-x-6"
            wire:sortable="sorted"
            wire:sortable-group="moved"
            wire:sortable.options="{ 'ghostClass': 'ghostSortClass', 'dragClass': 'dragSortClass', 'chosenClass': 'chosenSortClass' }"
        >
            @foreach ($columns as $column)
                <div
                    wire:key="{{ $column->id }}"
                    wire:sortable.item="{{ $column->id }}"
                >
                    <livewire:column
                        wire:key="{{ $column->id }}"
                        :column="$column"
                    />
                </div>
            @endforeach

            <div
                x-data="{ adding: false }"
                x-on:column-created.window="adding = false"
            >
                <template x-if="adding">
                    <form
                        wire:submit="createColumn"
                        class="w-[260px] rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm"
                    >
                        <div>
                            <x-input-label
                                for="title"
                                value="Title"
                                class="sr-only"
                            />
                            <x-text-input
                                id="title"
                                placeholder="Column title"
                                class="h-9 w-full"
                                wire:model="createColumnForm.title"
                                x-init="$el.focus()"
                            />
                            <x-input-error
                                :messages="$errors->get('createColumnForm.title')"
                            />
                        </div>

                        <div
                            class="mt-2 flex items-center justify-end space-x-2"
                        >
                            <x-primary-button>Create</x-primary-button>
                            <x-secondary-button
                                x-on:click="adding = false"
                                class="text-sm"
                            >
                                Cancel
                            </x-secondary-button>
                        </div>
                    </form>
                </template>
                <button
                    x-show="!adding"
                    x-on:click="adding = true"
                    class="flex w-[260px] items-center space-x-2 rounded-lg border border-gray-200 bg-white px-4 py-2 shadow-sm hover:bg-gray-200"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15"
                        />
                    </svg>

                    <span>Add a column</span>
                </button>
            </div>
        </div>
    </div>
</div>
