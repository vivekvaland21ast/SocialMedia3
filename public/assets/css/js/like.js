// Like a post


$('.like-button').click(function () {
    var postId = $(this).closest('.post').data('post-id');
    var likeCountElement = $(this).closest('.post').find('.like-count');
    $.ajax({
        type: 'POST',
        url: '/like/' + postId,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Update like count
                var currentLikeCount = parseInt(likeCountElement.text());
                likeCountElement.text(currentLikeCount + 1);

                // Update UI of like button
                $(this).addClass('liked'); // Example: Add a class to change button appearance
            } else {
                // Handle error if needed
            }
        },
        error: function (xhr, status, error) {
            // Handle error if needed
        }
    });
});

// Dislike a post
$('.dislike-button').click(function () {
    var postId = $(this).closest('.post').data('post-id');
    var dislikeCountElement = $(this).closest('.post').find('.dislike-count');
    $.ajax({
        type: 'POST',
        url: '/dislike/' + postId,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Update dislike count
                var currentDislikeCount = parseInt(dislikeCountElement.text());
                dislikeCountElement.text(currentDislikeCount + 1);

                // Update UI of dislike button
                $(this).addClass('disliked'); // Example: Add a class to change button appearance
            } else {
                // Handle error if needed
            }
        },
        error: function (xhr, status, error) {
            // Handle error if needed
        }
    });
});

