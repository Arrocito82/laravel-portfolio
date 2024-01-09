<form method="POST" action="{{ route('chirps.store') }}">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <input type="hidden" name="parent_id" value="{{$parent->id}}">
    <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
    <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
    <textarea name="message" placeholder="{{ __('What burning curiosities keep your mind alive? Ask away, and let\'s dive into the ocean of knowledge together!') }}"
        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>{{ old('message') }}</textarea>
    <x-input-error :messages="$errors->get('message')" class="mt-2" />
    <x-primary-button class="mt-4">{{ __('Comment') }}</x-primary-button>
</form>