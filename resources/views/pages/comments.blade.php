<a href="#my_modal_4{{ $post->id }}" data-modal-hide="#my_modal_4" data-modal-toggle="#my_modal_4">
    <svg fill="#ffff" height="24" viewBox="0 0 48 48" width="24" class="comment-button"
        data-post-id="{{ $post->id }}" onload="fetchComments({{ $post->id }})">
        <path clip-rule="evenodd"
            d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"
            fill-rule="evenodd"></path>
    </svg>
</a>

<dialog id="my_modal_4{{ $post->id }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <div class="modal-action">
                <a href="#" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</a>
            </div>
        </form>
        <h3 class="font-bold text-lg">Your comments</h3>

        <div id="comments-section-{{ $post->id }}" class="py-4 overflow-y-auto max-h-80 custom-scrollbar">
            <!-- Comments will be loaded here -->
        </div>

        <div class="flex items-center w-full mt-4">
            <input type="text" id="comment-input-{{ $post->id }}" placeholder="Type here"
                style="border-radius: 50px" class="input input-bordered input-info w-full max-w-sm rounded-full h-11" />
            <button class="w-11 h-11 p-1 bg-blue-500 rounded-full cursor-pointer ml-3"
                onclick="postComment({{ $post->id }})">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-full h-full">
                    <path
                        d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z" />
                </svg>
            </button>
        </div>
    </div>
</dialog>

<script>
    function postComment(postId, parentId = null) {
        let commentInput = parentId ? $('#reply-input-' + parentId) : $('#comment-input-' + postId);
        let body = commentInput.val();

        if (!body.trim()) {
            alert('Comment cannot be empty');
            return;
        }

        $.ajax({
            url: '{{ route('comments.store') }}',
            method: 'POST',
            data: {
                body: body,
                post_id: postId,
                parent_id: parentId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                commentInput.val('');
                fetchComments(postId);
            },
            error: function() {
                alert('Failed to add comment');
            }
        });
    }

    function fetchComments(postId) {
        $.get('/comments/' + postId, function(comments) {
            let commentsSection = $('#comments-section-' + postId);
            commentsSection.empty();
            comments.forEach(comment => {
                appendComment(commentsSection, comment, postId);
            });
        });
    }

    function appendComment(commentsSection, comment, postId, parentId = null) {
        const isAuthUser = comment.user_id === {{ auth()->id() }};
        let commentHtml = `
            <div id="comment-${comment.id}" class="chat ${isAuthUser ? 'chat-end' : 'chat-start'}" data-comment-id="${comment.id}" ${parentId ? 'style="margin-right: 20px;"' : ''}>
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img src="/profile_images/${comment.user.profile}" alt="User image">
                    </div>
                </div>
                <div class="chat-header">
                    ${comment.user.username}
                    <time class="text-xs opacity-50">${new Date(comment.created_at).toLocaleTimeString()}</time>
                </div>
                <div class="chat-bubble">${comment.body}</div>
                ${parentId ? `<div class="text-xs opacity-50 ml-2">Replied by ${$('#comment-' + parentId + ' .chat-header').text().trim().split(' ')[0]}</div>` : ''}
                ${isAuthUser && !parentId ? `
                <div class="chat-footer-container flex space-x-4 opacity-50">
                    <div class="chat-footer cursor-pointer" onclick="editComment(${comment.id}, ${postId})">
                        Edit
                    </div>
                    <div class="chat-footer">
                        |
                    </div>
                    <div class="chat-footer cursor-pointer" onclick="deleteComment(${comment.id}, ${postId})">
                        Delete
                    </div>
                    <div class="chat-footer">
                        |
                    </div>
                    <div class="chat-footer cursor-pointer" onclick="showReplyInput(${comment.id}, ${postId})">
                        Reply
                    </div>
                </div>` : (!parentId ? `
                <div class="chat-footer cursor-pointer" onclick="showReplyInput(${comment.id}, ${postId})">
                    Reply
                </div>` : '')}
            </div>
            <div id="replies-${comment.id}" class="ml-6">
                <!-- Replies will be loaded here -->
            </div>
        `;

        if (parentId) {
            $('#replies-' + parentId).append(commentHtml);
        } else {
            commentsSection.append(commentHtml);
        }

        if (comment.replies && comment.replies.length > 0) {
            comment.replies.forEach(reply => {
                appendComment($('#replies-' + comment.id), reply, postId, comment.id);
            });
        }
    }

    function showReplyInput(commentId, postId) {
        let replyInputHtml = `
            <div class="flex items-center w-full mt-4">
                <input type="text" id="reply-input-${commentId}" placeholder="Type your reply here"
                    style="border-radius: 50px" class="input input-bordered input-info w-full max-w-sm rounded-full h-11" />
                <button class="w-11 h-11 p-1 bg-blue-500 rounded-full cursor-pointer ml-3"
                    onclick="postComment(${postId}, ${commentId})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-full h-full">
                        <path
                            d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z" />
                    </svg>
                </button>
            </div>
        `;

        // Close existing reply inputs
        $('.reply-input-container').remove();

        if ($('#reply-input-container-' + commentId).length === 0) {
            $('#comment-' + commentId).append(`
                <div id="reply-input-container-${commentId}" class="reply-input-container">
                    ${replyInputHtml}
                </div>
            `);
        }
    }

    function editComment(commentId, postId) {
        let newBody = prompt('Edit your comment:');

        if (newBody && newBody.trim()) {
            $.ajax({
                url: `/comments/${commentId}`,
                method: 'PUT',
                data: {
                    body: newBody,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    fetchComments(postId);
                },
                error: function() {
                    alert('Failed to update comment');
                }
            });
        }
    }

    function deleteComment(commentId, postId) {
        if (confirm('Are you sure you want to delete this comment?')) {
            $.ajax({
                url: `/comments/${commentId}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    fetchComments(postId);
                },
                error: function() {
                    alert('Failed to delete comment');
                }
            });
        }
    }

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.chat-footer, .reply-input-container, .modal-box').length) {
            $('.reply-input-container').remove();
        }
    });
</script>
