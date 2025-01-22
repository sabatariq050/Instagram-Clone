<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 p-4">
                <!-- Column 1 (Image container) -->
                <div class="flex justify-center items-center p-6 rounded-lg">
                    <div class="relative size-40"> <!-- Specify the width and height for the image container -->
                        @if ($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}"
                                class="absolute inset-0 w-full h-full object-cover rounded-full">
                        @else
                            <img src="{{ asset('images/Profile.png') }}" alt="{{ $user->name }}"
                                class="absolute inset-0 w-full h-full object-cover rounded-full">
                        @endif
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="bg-gray-100 p-6 ">
                    <h1 class="font-semibold text-gray-800 mb-3">{{ $user->name }}</h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-0 p-0 max-w-sm custom-width">
                        <!-- Column 1 -->
                        <div class="flex">
                            <p class="text-sm">
                                {{$total_post_count}} Posts
                            </p>
                        </div>

                        <!-- Column 2 -->
                        <div class="">
                            <p class="text-sm">
                                150 Followers
                            </p>
                        </div>

                        <!-- Column 3 -->
                        <div class="flex">
                            <p class="text-sm">
                                450 Following
                            </p>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-4">
                        <p class="text-gray-600 text-sm">
                            {{$user?->description }}
                        </p>
                        <p class="text-gray-600 text-sm">
                            {{ $user?->url }}
                        </p>
                    </div>
                    <div class="mt-4 mt-4 flex space-x-4 ">
                        <form action="{{ route('profile.show') }}" method="GET">
                            @csrf
                            <x-button>
                                Edit Profile
                            </x-button>
                        </form>

                        <form action="{{ route('image-post.create') }}" method="GET">
                            @csrf
                            <x-button>
                                Create New Post
                            </x-button>
                        </form>

                    </div>
                </div>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg p-6">
                    <!-- Displaying User's Image Posts -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse ($posts as $post)
                            <div class="relative">
                                <!-- Image Container -->
                                <div class="w-full h-48 bg-white flex items-center justify-center overflow-hidden border-4 border-gray-800 rounded-lg">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                        class="max-w-full max-h-full object-contain">
                                </div>

                                <!-- Caption and Date -->
                                <div class="p-2">
                                    @if ($post->caption)
                                        <div class="text-sm text-gray-800">
                                            {{$user->name}}: {{ $post->caption }}
                                        </div>
                                    @endif
                                    <div class="text-xs text-gray-500">
                                        Posted on {{ $post->created_at->format('F j, Y, g:i a') }}
                                    </div>
                                </div>

                                <!-- Like Button -->
                             

                                <!-- Comment Section -->
                              
                            </div>
                        @empty
                            <p class="text-gray-600 text-sm col-span-full">No posts to display yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</x-app-layout>