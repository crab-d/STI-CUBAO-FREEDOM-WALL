$(document).ready(function() {
  $('#response').on('click', '.like_post', function() {
    const likeElement = $(this); // save reference
    const postId = likeElement.closest('.user_post').data('post-id');
    let currentLike = parseInt(likeElement.find('span').text());

    if (likeElement.hasClass('disabled-like')) {
      return;
    }

    $.ajax({
        url: '../User/Handler/Post_Like.php',
        type: 'POST',
 
        data: {
            post_id: postId,
        },
        success: function(response) {
          console.log('success')
              currentLike++;
              likeElement.find('span').text(currentLike);
              likeElement.addClass('disabled-like')
        },
        error: function(xhr, error) {
          console.log('error' + xhr.status + ' ' + error)
        }
    })
    $.ajax({
      url: '../User/Handler/NotificationHandler.php',
      type: 'POST',
      data: {
        post_ID: postId,
        notif_TYPE: 'like'
      }
    })

    
  });
});
