<x-modal-wrapper title="Edit card">
    <form wire:submit="updateCard" action="" class="space-y-3">
        <div>
            <x-input-label for="title" value="Title" class="sr-only" />
            <x-text-input class="w-full" id="title" autofocus wire:model="editCardForm.title" />
            <x-input-error :messages="$errors->get('editCardForm.title')" />
        </div>

        <div>
            <x-input-label for="description" value="Description" class="sr-only" />
            <x-textarea class="w-full" id="description" wire:model="editCardForm.description" rows="6" />
            <x-input-error :messages="$errors->get('editCardForm.description')" />
        </div>

        <div class="flex items-center justify-end space-x-2 mt-4">
            <x-secondary-button wire:click="archiveCard">
                Archive
            </x-secondary-button>
            <x-primary-button>
                Save
            </x-primary-button>
        </div>
    </form>
</x-modal-wrapper>
