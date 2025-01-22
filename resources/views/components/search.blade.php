<x-guest-layout>
    <div class="text-black/50">
        <div class="relative min-h-screen flex justify-center">
            <div class="w-full max-w-md px-6 lg:px-16 xl:px-32">
                <div class="relative w-full">
                    <!-- Search Input -->
                    <input
                        type="text"
                        id="search-user"
                        name="search"
                        placeholder="Search users..."
                        class="border border-gray-300 rounded-md p-2 flex-grow w-full"
                    >

                    <!-- Suggestions Dropdown -->
                    <ul
                        id="user-suggestions"
                        class="absolute bg-white border border-gray-300 rounded-md mt-1 w-full hidden"
                    >
                        <!-- Suggestions will be dynamically added here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search-user');
            const suggestionsBox = document.getElementById('user-suggestions');

            searchInput.addEventListener('input', async (event) => {
                const query = event.target.value.trim();

                if (query.length > 1) {
                    // Fetch user suggestions from the server
                    const response = await fetch(`{{ route('search.users') }}?search=${query}`);
                    const users = await response.json();

                    // Clear previous suggestions
                    suggestionsBox.innerHTML = '';

                    if (users.length > 0) {
                        users.forEach(user => {
                            const listItem = document.createElement('li');
                            listItem.classList.add('p-2', 'hover:bg-gray-100', 'cursor-pointer');
                            listItem.innerHTML = `
                                <a href="{{ url('/profile') }}/${user.id}" class="block">
                                    ${user.username}
                                </a>
                            `;
                            suggestionsBox.appendChild(listItem);
                        });

                        suggestionsBox.classList.remove('hidden');
                    } else {
                        // Show "No results found" message
                        const noResultItem = document.createElement('li');
                        noResultItem.classList.add('p-2', 'text-gray-500');
                        noResultItem.textContent = 'No results found.';
                        suggestionsBox.appendChild(noResultItem);
                        suggestionsBox.classList.remove('hidden');
                    }
                } else {
                    suggestionsBox.classList.add('hidden');
                }
            });

            // Hide dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.relative')) {
                    suggestionsBox.classList.add('hidden');
                }
            });
        });
    </script>
</x-guest-layout>
