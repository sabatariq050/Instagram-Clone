<div class="relative flex flex-col items-center">
<div class="relative w-full max-w-screen-xl mx-auto px-6 lg:px-16 xl:px-32">
<header class="grid grid-cols-2 lg:grid-cols-2 items-center gap-4 py-4 lg:py-10 ">
                    <!-- Image on the left -->
                    <div class="flex justify-start">
                        <x-authentication-card-logo />
                    </div>

                    <!-- Navigation links on the right -->
                    @if (Route::has('login'))
                        <nav class="flex justify-end gap-4 lg:gap-6">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>


</div>
</div>