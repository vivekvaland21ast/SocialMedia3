@include('layouts.header')
<nav class="navbar bg-base-100 w-full fixed top-0 h-10 z-50 shadow-lg overflow-hidden">
    @include('layouts.navbar')
</nav>

@if (isset($posts))
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform shadow-lg shadow-gray-600 bg-base-100 -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto shadow-lg shadow-gray-600 bg-base-100">

            <div class="hero-content flex-row lg:flex-col">
                <img src="{{ asset('profile_images/' . $currentUser->profile) }}"
                    class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800" alt="Profile Image" />

                <div class="">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-white mb-1">
                        {{-- {{ $posts->profile->username }} --}}
                        {{ $currentUser->username }}
                    </h3>
                </div>
                @include('pages.editProfile')
            </div>

            <div
                class="shadow max-w-sm mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg shadow-gray-800">

                <div class="stat">
                    <div class="stat-figure text-primary">
                        <div class="stat-figure text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title font-semibold text-gray-200">Posts</div>
                    <div class="text-primary">
                        {{ $currentUser->posts->count() }}
                    </div>
                </div>

                @include('pages.myFriends')

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title font-semibold text-gray-200">Likes</div>
                    <div class="text-secondary">83
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-10 mt-14">
            <section class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- @foreach ($posts as $post)
                        @include('pages.photos')
                    @endforeach --}}
                    @include('pages.photos')
                </div>
            </section>
        </div>
    </div>
@endif
@include('layouts.footer')
