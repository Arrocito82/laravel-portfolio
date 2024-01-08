<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                placeholder="{{ __('What\'s the project name?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="{{ __('What\'s the project about?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <label for="contribution">Contribution</label>
            <textarea id="contribution" name="contribution" placeholder="{{ __('What did you do to help the project succeed?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('contribution') }}</textarea>
            <x-input-error :messages="$errors->get('contribution')" class="mt-2" />
            <label for="repository">Repository</label>
            <input id="respository" type="text" name="repository" value="{{ old('repository') }}"
                placeholder="{{ __('Where\'s the source code? Share Github link') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            <x-input-error :messages="$errors->get('repository')" class="mt-2" />
            <label for="preview">Preview</label>
            <input id="preview" type="text" name="preview" value="{{ old('preview') }}"
                placeholder="{{ __('Is the project available online? Share the link to preview it') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            <x-input-error :messages="$errors->get('preview')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create Project') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
