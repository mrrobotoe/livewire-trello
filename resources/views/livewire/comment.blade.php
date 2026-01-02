<div x-data="{
    isReplying: true
}">
    <div class="flex flex-col space-y-2 border borer-gray-200 w-full rounded-lg shadow-sm p-2">
        <div class="flex space-x-2 items-center">
            <div class="flex items-center justify-center size-5 rounded-full bg-gray-300 ">
                <span class="font-semibold text-xs p-1">{{ $comment->user->getInitials() }}</span>
            </div>
            <div class="font-semibold text-sm">{{ $comment->user->name }}</div>
            <span class="text-xs text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
        </div>

        <p class="text-sm">
            {{ $comment->content }}
        </p>


        <template x-if="isReplying">
            <hr class="my-2 -mx-2">
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
        </template>
    </div>
</div>
