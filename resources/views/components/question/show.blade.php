<div class="mt-6 bg-slate-50 shadow-sm rounded-lg divide-y">
    <div class="p-6 flex space-x-2">
        <div class="pe-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
        </div>
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-gray-800">{{ $comment->user->name }}</span>
                    <small class="ml-2 text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</small>
                    @unless ($comment->created_at->eq($comment->updated_at))
                        <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                    @endunless
                </div>
                @if ($comment->user->is(auth()->user()))
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('chirps.edit', $comment)">
                                {{ __('Edit') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('chirps.destroy', $comment) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('chirps.destroy', $comment)"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Delete') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>
            <p class="mt-4 text-lg text-gray-900">{{ $comment->message }}</p>
            <div class="mt-2" id="Answer{{ __($comment->id) }}" data-accordion="collapse">
                <div id="createAnswerButton{{ __($comment->id) }}">
                    <x-primary-button type="button" data-accordion-target="#showAnswers{{ __($comment->id) }}"
                        aria-expanded="true" aria-controls="showAnswers{{ __($comment->id) }}">
                        Answers
                    </x-primary-button>
                    <x-primary-button type="button" data-accordion-target="#createAnswer{{ __($comment->id) }}"
                        aria-expanded="false" aria-controls="createAnswer{{ __($comment->id) }}">
                        Comment
                    </x-primary-button>
                </div>
                <div id="createAnswer{{ __($comment->id) }}" class="hidden my-4"
                    aria-labelledby="Answer{{ __($comment->id) }}" >
                    <x-answer.create :parent="$comment" :project="$project"/>
                </div>
                <div id="showAnswers{{ __($comment->id) }}" class="hidden"
                    aria-labelledby="Answer{{ __($comment->id) }}" >
                    <x-answer.index :parent="$comment"/>
                </div>
            </div>
        </div>
    </div>

</div>
