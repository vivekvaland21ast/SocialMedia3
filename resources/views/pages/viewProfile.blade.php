@include('layouts.header')

<!-- profile card -->
<div class="w-1/4 px-3"> <!-- 20% width -->
    <!-- Content for the first grid -->
    <!-- Card start -->
    <div class="max-w-sm mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg shadow-gray-800">
        <div class="px-4 pb-6">
            <div class="text-center my-4">
                <img src="{{ asset('profile_images/' . $currentUser->profile) }}"
                    class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                    alt="Profile Image" />
                <div class="py-2">
                    <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-1">
                        {{ '@' . $currentUser->username }}
                    </h3>
                    <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                        {{ $currentUser->full_name }}
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center w-full">
                <button onclick="window.location.href='{{ route('profile') }}'"
                    class="flex-1 mr-2 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-semibold text-md hover:bg-blue-800 dark:hover:bg-blue-900 py-2">
                    View Profile
                </button>
            </div>
        </div>
    </div>
    <!-- Card end -->
</div>
@include('layouts.footer')
