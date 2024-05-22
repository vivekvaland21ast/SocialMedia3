<div class="drawer drawer-end">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label for="my-drawer-4" class="drawer-button btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </label>
    </div>
    <div class="drawer-side">
        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 min-h-full bg-base-200 text-base-content" style="width: 30%;">
            <!-- Sidebar content here -->
            <div role="tablist" class="tabs tabs-bordered">
                <!-- Notification -->
                <div class="text-gray-800 dark:text-white py-4 px-4">
                    <div class="border-b">
                        <h2 class="font-bold text-xl py-1">Notifications</h2>
                    </div>
                </div>
                <div class="drawer drawer-end">
                    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
                    <div class="drawer-content p-4">
                        <!-- Page content here -->
                        <div class="scrollbar-y-auto scrollbar-hide overflow-auto" style="max-height: 570px;">
                            @if ($notification->isEmpty())
                                <p>No notifications</p>
                            @else
                                @foreach ($notification as $notifications)
                                    <div class="notification-item p-3 bg-white dark:bg-gray-900 mb-2 border-2 border-gray-700 rounded-lg"
                                        style="height: 70px;">
                                        <div class="flex items-center">
                                            <img class="object-cover w-12 h-12 rounded-full"
                                                src="{{ asset('post_images/' . $notifications->data['post_image']) }}"
                                                alt="Profile Image" />
                                            <div class="ml-3 overflow-hidden">
                                                <p class="font-medium text-gray-800 dark:text-gray-200">
                                                    {{ $notifications->data['username'] }}</p>
                                                <p class="max-w-xs text-sm text-gray-600 dark:text-gray-400 truncate">
                                                    liked your post
                                                </p>
                                            </div>
                                            {{-- <img class="object-cover flex item-end w-12 h-12 rounded-lg"
                                                src="{{ asset('post_images/' . $notifications->data['post_image']) }}"
                                                alt="Profile Image" /> --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</div>
