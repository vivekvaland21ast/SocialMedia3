{{-- @if (isset($post)) --}}
@foreach ($posts as $post)
    <div id="imagePopup" class="popup-overlay">
        <div class="popup bg-gray-800 modal-box dialog flex flex-col items-center">
            <div class="close-btn btn btn-md btn-circle btn-ghost absolute right-2 top-2" onclick="closeImagePopup()">✕
            </div>
            <img id="popupImage" class="popup-image" src="{{ asset('post_images/' . $post->post_caption) }}"
                alt="popup-image">
            <div class="font-semibold text-md mt-2 text-red-500">
                <span class="font-semibold text-md text-warning">
                    {{ $post->profile->username }}
                </span>
                <span id="popupCaption" class="text-sm text-gray-300">
                    {{ $post->post_caption }}
                </span>
            </div>
        </div>
    </div>

    <div
        class="w-full border-2 bg-gray-900 rounded-lg shadow-xl shadow-gray-800 overflow-hidden flex flex-col justify-center items-center">
        <button
            class="toggle-archive-btn h-8 px-5 mr-4 text-sm mt-2 font-bold {{ $post->archive ? 'text-red-400 border border-red-400 rounded-full hover:bg-red-100 hover:text-black' : 'text-blue-400 border border-blue-400 rounded-full hover:bg-blue-100 hover:text-black' }}"
            data-post-id="{{ $post->id }}" data-archived="{{ $post->archive ? 'true' : 'false' }}">
            {{ $post->archive ? 'Unarchived' : 'Archived' }}
        </button>
        <div class="relative">
            <img class="object-center object-cover h-40 p-5 w-full"
                src="{{ asset('post_images/' . $post->post_image) }}" alt="photo">
        </div>
        <div class="flex justify-center py-5">
            <!-- Eye icon -->
            <div class="text-center w-5 h-5 cursor-pointer mx-4"
                onclick="showImagePopup('{{ asset('post_images/' . $post->post_image) }}', '{{ $post->post_caption }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-full h-full">
                    <path fill="#74C0FC"
                        d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                </svg>
            </div>

            <!-- Pen icon -->
            <div class="text-center w-5 h-5 cursor-pointer mx-4">
                <a href="#my_modal_2{{ $post->id }}" data-modal-hide="#my_modal_2" data-modal-toggle="#my_modal_2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#FFD43B"
                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                    </svg>
                </a>
            </div>
            <!-- Dustbin icon -->
            <div class="text-center w-5 h-5 cursor-pointer mx-4">
                <form id="delete-post-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}"
                    method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="javascript:void(0);" onclick="deletePost({{ $post->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="#fa0000"
                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                    </svg>
                </a>
            </div>
        </div>
        <!-- update modal -->
        <dialog id="my_modal_2{{ $post->id }}" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <div class="modal-action">
                        <a href="#" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</a>
                    </div>
                </form>
                <h3 class="font-bold text-lg">Update your post</h3>
                <div id="message"></div>
                <form id="updateForm" class="p-4 md:p-5" action="{{ route('posts.update', $post->id) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <input type="file" name="imageFile" id="imageFile"
                                value="{{ asset('post_images/' . $post->post_image) }}"
                                class="file-input file-input-bordered file-input-primary w-full file-input-sm max-w-xs" />
                        </div>
                        <div class="col-span-2">
                            <textarea id="captionText" rows="4" name="captionText"
                                class="textarea textarea-primary block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-blue-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="What's on your mind!!!" value="">{{ $post->post_caption }}</textarea>
                        </div>
                    </div>
                    <button type="submit" name="update_post" id="update_data" value="{{ $post->id }}"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Update
                    </button>
                </form>
            </div>
        </dialog>

        {{-- friend list model --}}
        <input type="checkbox" id="my_modal_7" class="modal-toggle" />
        <div class="modal bg-white dark:bg-gray-900" role="dialog">
            <div class="modal-box bg-white dark:bg-gray-900">
                <h3 class="text-lg font-bold bg-white dark:bg-gray-900">Your Friends</h3>
                <ul id="added-friends-list">
                    <!-- Friend items will be dynamically added here -->
                </ul>
            </div>
            <label class="modal-backdrop" for="my_modal_7">Close</label>
        </div>
    </div>
@endforeach
{{-- @endif --}}

<script>
    function showImagePopup(imageSrc, caption) {
        var popup = document.getElementById('imagePopup');
        var popupImage = document.getElementById('popupImage');
        var popupCaption = document.getElementById('popupCaption');

        popupImage.src = imageSrc;
        popupCaption.innerText = caption;
        popup.style.display = "flex";
    }

    function closeImagePopup() {
        var popup = document.getElementById('imagePopup');
        popup.style.display = "none";
    }

    function deletePost(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('delete-post-form-' + postId).submit();
        }
    }
</script>


{{-- friend list --}}
<script>
    $(document).ready(function() {
        $('#my_modal_7').change(function() {
            if ($(this).is(":checked")) {
                $.ajax({
                    url: "{{ route('fetch-friends') }}",
                    type: 'GET',
                    success: function(response) {
                        $('#added-friends-list').empty();
                        response.friends.forEach(function(friend) {
                            var friendHtml = `
                                <div id="list-${friend.id}" 
                                    class="scrollbar-y-auto scrollbar-hide overflow-auto p-2 flex items-center bg-white dark:bg-gray-900 justify-between cursor-pointer hover:bg-gray-700">
                                    <div class="flex items-center">
                                        <img class="h-12 w-12 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                                            src="{{ asset('profile_images/') }}/${friend.profile}" alt="Profile Image" />
                                        <div class="ml-2 flex flex-col">
                                            <div class="leading-snug text-sm text-gray-200 font-bold">
                                                ${friend.username}
                                            </div>
                                            <div class="leading-snug text-xs text-gray-600">
                                                @${friend.full_name}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#added-friends-list').append(friendHtml);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
</script>

{{-- archived --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.toggle-archive-btn');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.dataset.postId;
                const isArchived = this.dataset.archived === 'true';

                // Toggle the state
                const newArchivedState = !isArchived;

                // Send an AJAX request to update the state in the backend
                $.ajax({
                    url: newArchivedState ? '{{ route('archive') }}' :
                        '{{ route('unarchive') }}',
                    type: 'POST',
                    data: {
                        postId: postId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the button state
                            button.dataset.archived = newArchivedState;
                            button.textContent = newArchivedState ? 'Unarchived' :
                                'Archived';

                            // Toggle classes for appearance change
                            if (newArchivedState) {
                                button.classList.remove('text-blue-400',
                                    'border-blue-400', 'hover:bg-blue-100',
                                    'hover:text-black');
                                button.classList.add('text-red-400',
                                    'border-red-400', 'hover:bg-red-100',
                                    'hover:text-black');
                            } else {
                                button.classList.remove('text-red-400',
                                    'border-red-400', 'hover:bg-red-100',
                                    'hover:text-black');
                                button.classList.add('text-blue-400',
                                    'border-blue-400', 'hover:bg-blue-100',
                                    'hover:text-black');
                            }
                        } else {
                            alert('Failed to update the post state: ' + response
                                .message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating post state:', error);
                        alert('Failed to update the post state.');
                    }
                });
            });
        });
    });
</script>


