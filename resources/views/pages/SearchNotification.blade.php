<div class="drawer drawer-end">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        {{-- <a href="{{ route('notifications.index') }}"> --}}
            <label for="my-drawer-4" class="drawer-button btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </label>
        {{-- </a> --}}
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
                    <div class="drawer-content">
                        <!-- Page content here -->
                    </div>
                </div>
            </div>
        </ul>
    </div>
</div>

{{-- <script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var query = this.value.trim();
        console.log(query);
        // If the query is empty, do not make AJAX request
        if (!query) {
            document.getElementById('userList').innerHTML = '';
            return;
        }

        // Make AJAX request to search endpoint
        axios.get('{{ route('user.search') }}', {
                params: {
                    query: query
                }
            })
            .then(function(response) {
                var users = response.data;
                var userList = document.getElementById('userList');
                userList.innerHTML = '';

                // Append each user to the user list
                users.forEach(function(profiles) {
                    var userHtml = `
                        <div class="user-item p-2 flex items-center bg-white dark:bg-gray-900 justify-between border-gray-700 border-t cursor-pointer hover:bg-gray-700">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4" src="{{ asset('profile_images') }}/${user.profile}" alt="Profile Image" />
                                <div class="ml-2 flex flex-col">
                                    <div class="leading-snug text-sm text-gray-200 font-bold">${profiles.full_name}</div>
                                    <div class="leading-snug text-xs text-gray-600">@${profiles.username}</div>
                                </div>
                            </div>
                            <button class="view-btn h-8 px-5 mr-4 text-sm font-bold text-blue-400 border border-blue-400 rounded-full hover:bg-blue-100 hover:text-black" data-user-id="${user.user_id}">Add</button>
                        </div>`;
                    userList.insertAdjacentHTML('beforeend', userHtml);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
</script> --}}

{{-- <script>
    function fetchNotifications() {
        $.ajax({
            url: '/home',
            method: 'GET',
            success: function(response) {
                $('.notifications').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function() {
        // Perform initial fetch
        fetchNotifications();

        // Poll for new notifications every 5 seconds
        setInterval(fetchNotifications, 5000);

        // Add event listener for like button click
        $('.toggle-like-btn').on('click', function(e) {
            e.preventDefault();
            var postId = $(this).data('post-id');
            $.ajax({
                url: '{{ route('like.toggle') }}',
                method: 'POST',
                data: {
                    post_id: postId
                },
                success: function(response) {
                    // Refresh notifications after like operation
                    fetchNotifications();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.drawer-button').addEventListener('click', function() {
            fetch('/notifications')
                .then(response => response.json())
                .then(data => {
                    const container = document.querySelector(
                        '.notifications-container .flex.flex-col.gap-3');
                    container.innerHTML = '';

                    data.notifications.forEach(notification => {
                        const div = document.createElement('div');
                        div.className =
                            'relative border border-gray-200 rounded-lg shadow-lg';
                        div.innerHTML = `
                        <div class="flex items-center p-4">
                            <img class="object-cover w-12 h-12 rounded-lg" src="/profile_images/${notification.sender.profile}" alt="Profile Image" />
                            <div class="ml-3 overflow-hidden">
                                <p class="font-medium text-white-900">${notification.sender.username} liked your post</p>
                                <p class="max-w-xs text-sm text-gray-500 truncate">
                                    Post Caption: ${notification.post.post_caption}
                                </p>
                            </div>
                        </div>
                    `;
                        container.appendChild(div);
                    });
                });
        });
    });
</script> --}}
