@extends('masterLayout')
@section('home')
    <!-- post -->
    <div class="w-3/6 px-2 overflow-y-auto max-h-screen scrollbar-hide"> <!-- 50% width -->
        <!-- Content for the second grid -->
        @if (isset($posts))
            @foreach ($posts as $post)
                <!-- Card start -->
                <div class="post max-w-xl mx-auto dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg mb-4"
                    data-post-id="{{ $post->user_id }}">
                    <div class="flex items-center justify-between px-4 py-3 border-b">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full"
                                src="{{ asset('profile_images/' . $post->profile->profile) }}" />
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
                        <img src="{{ asset('post_images/' . $post->post_image) }}" class="w-full" />
                    </div>

                    <div class="flex items-center justify-between mx-4 mt-3 mb-2">
                        <div class="flex gap-5">
                            <div class="post-content">
                                <!-- Like button -->
                                <svg fill="{{ $post->likes->contains('user_id', auth()->id()) ? 'red' : '#ffff' }}"
                                    height="24" viewBox="0 0 48 48" width="24" class="toggle-like-btn"
                                    data-post-id="{{ $post->id }}">
                                    <path
                                        d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                    </path>
                                </svg>
                            </div>
                            @include('pages.comments')
                        </div>
                    </div>
                    <div class="font-semibold text-md mx-4 mt-3 text-primary like-count">
                        <p class="likes-count">{{ $post->likes->count() }} Likes</p>
                    </div>
                    <div class="font-semibold text-md mx-4 mb-3 text-red-500">
                        <span class="font-semibold text-md text-warning">
                            {{ $post->profile->username }}
                        </span>
                        <span class="text-sm text-gray-300">
                            {{ $post->post_caption }}
                        </span>
                        <span class="text-gray-500 text-sm block">
                            {{ $post->created_at }}
                        </span>
                    </div>
                </div>
                <!-- Card end -->
            @endforeach
        @endif
    </div>
    @include('pages.friendsList')
    <script>
        $(document).ready(function() {
            $('.toggle-like-btn').click(function() {
                var postId = $(this).data('post-id');
                var button = $(this);

                $.ajax({
                    url: "{{ route('posts.toggle-like') }}",
                    type: 'POST',
                    data: {
                        post_id: postId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        // Update UI accordingly
                        button.closest('.post').find('.likes-count').text(data
                            .total_likes + ' Likes');
                        // Toggle button fill color
                        if (data.liked) {
                            button.attr('fill', 'red');
                        } else {
                            button.attr('fill', '#ffff');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
