$(document).ready(function() {
  $('#response').on('click', '.like_post', function() {
    let postId = $(this).closest('.user_post').data('post-id');
    let currentLike = $(this).closest('.like_post').find('span').text();
    console.log("Like clicked on post id:", postId);
    console.log("Like  on post id:", currentLike);

    $.ajax({
        url: '../User/Handler/LikePostHandler.php',
        type: 'POST',
        data: {
            post_id: postId,
        },
        success: function(response) {
            if (response) {

            }
        }
    })

    
  });
});
