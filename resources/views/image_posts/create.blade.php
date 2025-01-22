<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('image-post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Caption Field -->
                    <div class="mb-4">
                        <label for="caption" class="block text-sm font-medium text-gray-700 mb-1">
                            Caption
                        </label>
                        <input type="text" name="caption" id="caption" placeholder="Enter caption"
                               value="{{ old('caption') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <!-- Image Field -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                            Image
                        </label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <!-- Submit Button -->
                    <x-button>Post Image</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
