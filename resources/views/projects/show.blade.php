<x-app-layout>
    <div class="container mx-auto">

        @if ($project->user->is(auth()->user()))
            <div class="mt-6 flex items-center justify-end gap-x-2">
                <x-primary-button class="mt-4"><a
                        href="{{ route('projects.edit', $project) }}">Edit</a></x-primary-button>
                <form method="POST" action="{{ route('projects.destroy', $project) }}">
                    @csrf
                    @method('delete')
                    <x-danger-button type="submit" class="mt-4"
                        onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Delete') }}</x-danger-button>
                </form>


            </div>
        @endif

        {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
        <img class="w-full"
            src="data:image/png;base64,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">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"><a
                    href="{{ route('projects.show', $project) }}">{{ __($project->name) }}</a>
            </div>
            <p class="text-gray-700 text-base">
                {!! Str::limit($project->description, 100, ' ...') !!}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
        </div>
    </div>
</x-app-layout>
