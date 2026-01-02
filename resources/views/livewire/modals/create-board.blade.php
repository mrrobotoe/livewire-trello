<x-modal-wrapper title="Create Board">
    <form wire:submit="createBoard" action="" class="space-y-3">
        <div>
            <x-input-label for="title" value="Title" class="sr-only"/>
            <x-text-input
                class="w-full"
                id="title"
                autofocus
                wire:model="createBoardForm.title"
            />
            <x-input-error :messages="$errors->get('createBoardForm.title')"/>
        </div>

        <div class="mt-4 flex items-center justify-end space-x-2">
            <x-primary-button>Create</x-primary-button>
        </div>
    </form>
</x-modal-wrapper>
