<div x-data="{
    isReplying: false
}">
    <div class="group flex flex-col space-y-2 border borer-gray-200 w-full rounded-lg shadow-sm p-2">
        <div class="relative flex space-x-2 items-center">
            <div class="flex items-center justify-center size-5 rounded-full bg-gray-300 ">
                <span class="font-semibold text-xs p-1">{{ $comment->user->getInitials() }}</span>
            </div>
            <div class="font-semibold text-sm">{{ $comment->user->name }}</div>
            <span class="text-xs text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
            <x-secondary-button @click="isReplying = ! isReplying"
                                class="invisible absolute top-0 right-0 mt mr-2 !px-1 !py-1 !rounded-full !border-0 shadow-none hover:bg-gray-200 group-hover:visible">
                <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     class="size-4 stroke-gray-300">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier"><title>reply</title>
                        <path
                            d="M3.488 15.136q0 0.96 0.8 1.472l10.72 7.136q0.416 0.288 0.896 0.32t0.928-0.224 0.704-0.672 0.256-0.896v-3.584q3.456 0 6.208 1.984t3.872 5.152q0.64-1.792 0.64-3.552 0-2.912-1.44-5.376t-3.904-3.904-5.376-1.44v-3.584q0-0.48-0.256-0.896t-0.704-0.672-0.928-0.224-0.896 0.32l-10.72 7.136q-0.8 0.512-0.8 1.504z"></path>
                    </g>
                </svg>
            </x-secondary-button>
        </div>

        <p class="text-sm">
            {{ $comment->content }}
        </p>


        <template x-if="isReplying">
            <div class="">
                <hr class="my-2 -mx-2">
                <div class="flex space-x-3 items-center">
                    <div class="flex items-center justify-center size-5 rounded-full bg-gray-300 ">
                        <span class="font-semibold text-xs p-1">{{ $comment->user->getInitials() }}</span>
                    </div>
                    <div class="relative">
                        <x-input-label
                            for="comment"
                            value="Comment"
                            class="sr-only"
                        />
                        <x-text-input
                            class="p-0 w-full resize-none text-sm border-none shadow-none outline-none ring-0 focus:ring-0"
                            id="comment"
                            placeholder="Leave a comment..."
                            wire:model="createCommentForm.content"
                            x-init="$el.focus()"
                        />
                        <x-input-error
                            :messages="$errors->get('createCommentForm.content')"
                        />
                        {{--                <x-secondary-button class="absolute bottom-0 right-0 mb-3 mr-2 !px-2 !py-2 !rounded-full"--}}
                        {{--                                    wire:click="$dispatch('add-comment')"--}}
                        {{--                                    wire:ignore.self>--}}
                        {{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                        {{--                         stroke="currentColor" class="size-3">--}}
                        {{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18"/>--}}
                        {{--                    </svg>--}}
                        {{--                </x-secondary-button>--}}
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
