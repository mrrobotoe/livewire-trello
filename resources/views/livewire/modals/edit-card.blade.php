<x-modal-wrapper title="Edit card">
    <form wire:submit="updateCard" action="" class="space-y-3">
        <div>
            <x-input-label for="title" value="Title" class="sr-only"/>
            <x-text-input
                class="w-full"
                id="title"
                autofocus
                wire:model="editCardForm.title"
            />
            <x-input-error :messages="$errors->get('editCardForm.title')"/>
        </div>

        <div>
            <x-input-label
                for="description"
                value="Description"
                class="sr-only"
            />
            <x-textarea
                class="w-full"
                id="description"
                wire:model="editCardForm.description"
                rows="6"
            />
            <x-input-error
                :messages="$errors->get('editCardForm.description')"
            />
        </div>

        <div class="bg-gray-200 w-full h-px"></div>

        <div class="flex flex-col space-y-3">
            <h3 class="font-medium text-sm">Activity</h3>
            @if ($comments->count() > 0)
                @foreach ($comments as $comment)
                    <livewire:comment :comment="$comment" :key="$comment->id"/>
                @endforeach
            @endif
            <div class="relative">
                <x-input-label
                    for="comment"
                    value="Comment"
                    class="sr-only"
                />
                <x-textarea
                    class="w-full resize-none text-sm"
                    id="comment"
                    placeholder="Leave a comment..."
                    wire:model="createCommentForm.content"
                    rows="3"
                />
                <x-input-error
                    :messages="$errors->get('createCommentForm.content')"
                />

                <x-secondary-button class="absolute bottom-0 right-0 mb-3 mr-2 !px-2 !py-2 !rounded-full"
                                    wire:click="$dispatch('add-comment')"
                                    wire:ignore.self>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18"/>
                    </svg>
                </x-secondary-button>
            </div>
        </div>


        <div class="mt-4 flex items-center justify-end space-x-2">
            {{--            <x-secondary-button wire:click="archiveCard">--}}
            {{--                Archive--}}
            {{--            </x-secondary-button>--}}
            <x-primary-button>Save</x-primary-button>
        </div>
    </form>
</x-modal-wrapper>
