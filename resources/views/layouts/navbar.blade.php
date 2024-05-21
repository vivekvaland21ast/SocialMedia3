<div class="navbar-start px-3">
    <button
        class="text-white inline-flex items-center bg-warning-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        onclick="my_modal_3.showModal()">+ Add Post</button>
    <!-- Reduced height -->

</div>
<div class="navbar-center hidden lg:flex text-3xl font-semibold cursor-pointer"><a href="{{ route('posts.home') }}">
        <span class="text-primary">S</span>ocial<span class="text-secondary">M</span>ate
    </a>
</div>

<!-- nav-end-menu -->
<div class="navbar-end py-2">
    <!-- Search -->
    {{-- <div class="form-control">
        <input type="search" placeholder="Search" id="searchData" name="search"
            class="input input-bordered input-info w-full max-w-xs h-10" />
    </div>
    <!-- search button -->
    <button class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button> --}}
    <!-- theme -->
    <label class="swap swap-rotate px-1">

        <!-- this hidden checkbox controls the state -->
        <input type="checkbox" class="theme-controller" value="synthwave" />

        <!-- sun icon -->
        <svg class="swap-off fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 24">
            <path
                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
        </svg>

        <!-- moon icon -->
        <svg class="swap-on fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 24">
            <path
                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
        </svg>

    </label>
    <!-- notification -->
    {{-- <details class="dropdown">
        <summary class="m-1 btn btn-ghost btn-circle">
            <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="badge badge-xs badge-primary indicator-item">8</span>
            </div>
        </summary>
        <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box" style="width: 300px; padding: 10px">
            <div class='flex flex-col gap-3'>
                <div class="relative border border-gray-200 rounded-lg shadow-lg">
                    <div class="flex items-center p-4">
                        <img class="object-cover w-12 h-12 rounded-lg" src="user profile" alt="" />
                        <div class="ml-3 overflow-hidden">
                            <p class="font-medium text-white-900">user name</p>
                            <p class="max-w-xs text-sm text-gray-500 truncate">
                                user liked your post
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </details> --}}

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type='submit' class='btn btn-outline btn-error'>Logout</button>
    </form>

    {{-- Search new --}}
    <div class="px-4">
        @include('pages.SearchNotification')
    </div>

    <!-- Profile -->
    <div class="dropdown dropdown-end px-4">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <img src="{{ asset('profile_images/' . $currentUser->profile) }}"
                class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto" alt="Profile Image" />
        </div>
    </div>
    <!-- Main modal -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Upload your post</h3>
            <form id="postForm" class="p-4 md:p-5" action="{{ route('posts.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <input type="file" name="imageFile"
                            class="file-input file-input-bordered file-input-primary w-full file-input-sm max-w-xs" />
                    </div>
                    <div class="col-span-2">
                        <textarea id="description" rows="4" name="captionText"
                            class="textarea textarea-primary block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-blue-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="What's on your mind!!!"></textarea>
                    </div>
                </div>
                <button type="submit" name="post" class="btn btn-outline btn-primary">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Post
                </button>
            </form>
        </div>
    </dialog>
</div>

{{-- <script>
    $("#postForm").submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting
        var formData = new FormData(this); // Create FormData object
        $.ajax({
            url: "{{ route('posts.store') }}", // Form action URL
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from processing data
            contentType: false, // Set content type to false
            success: function(response) {
                console.log(response);
                if (response.success) {
                    var post = response.post;
                    // console.log(post);
                    // var imagePath = "assets/posts/" + post.post_image;
                    var newPost = `
                    <div class="max-w-xl mx-auto dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg mb-4"
                        data-post-id="${{ $post->user_id }}">
                        <div class="flex items-center justify-between px-4 py-3 border-b">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full"
                                    src="${{ asset('profile_images/' . $post->profile->profile) }}" />
                                <div class="ml-3">
                                    <span class="text-md font-semibold antialiased block leading-tight">
                                        {{ $post->profile->full_name }}
                                    </span>
                                    <span class="text-gray-500 text-sm block">
                                        {{ '@' . $post->profile->username }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <img src="${{ asset('post_images/' . $post->post_image) }}" class="w-full" />
                        </div>

                        <div class="flex items-center justify-between mx-4 mt-3 mb-2">
                            <div class="flex gap-5">
                                <div>
                                    <!-- Like button -->
                                    <svg fill="#ffff" height="24" viewBox="0 0 48 48" width="24"
                                        class="like-button" data-post-id="${{ $post->id }}">
                                        <path
                                            d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <!-- Dislike button -->
                                    <svg fill="#ffff" height="24" viewBox="0 0 48 48" width="24"
                                        class="dislike-button" data-post-id="${{ $post->id }}">
                                        <path clip-rule="evenodd"
                                            d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <svg fill="#ffff" height="24" viewBox="0 0 48 48" width="24">
                                    <path
                                        d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex">
                                <svg fill="#ffff" height="24" viewBox="0 0 48 48" width="24">
                                    <path
                                        d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="font-semibold text-md mx-4 mt-3 text-primary like-count">
                            Likes: ${{ $post->likes }}
                            Dislikes: ${{ $post->dislikes }}
                        </div>
                        <div class="font-semibold text-md mx-4 mb-3 text-red-500">
                            <span class="font-semibold text-md text-warning">
                                ${{ $post->profile->username }}
                            </span>
                            <span class="text-sm text-gray-300">
                                ${{ $post->post_caption }}
                            </span>
                            <span class="text-gray-500 text-sm block">
                                ${{ $post->created_at }}
                            </span>
                        </div>
                    </div>    
                    `;
                    // Append the new post to the posts container
                    $("div.posts").prepend(newPost);
                    // Reset the form
                    $("#postForm")[0].reset();
                } else {
                    alert("Post Add Erorr");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error submitting post. Please try again.");
            },
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        $('#submitPost').click(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData($('#postForm')[0]);

            $.ajax({
                url: "{{ route('posts.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Append the new post to the list on the index page
                        $('#postsList').prepend(response.postHtml);
                        // Clear the form inputs
                        $('#postForm')[0].reset();
                        alert('Post created successfully.');
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(response) {
                    alert('Error creating post. Please try again.');
                }
            });
        });
    });
</script> --}}
