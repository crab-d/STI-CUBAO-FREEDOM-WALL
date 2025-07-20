$(document).ready(() => {
    $('#response').on('click','.comment_post', function() {
        $post_id = $(this).closest('.user_post').data('post-id');  
        loadComments($post_id)
    })

    function loadComments(Post_id) {
        $comment_container = $('#commentSectionModal-id-'+ Post_id+' .modal-content .modal-body');
        $.ajax({
            url: '../User/Handler/RetrieveComment.php',
            type: 'GET',
            dataType: 'json',
            data: {
                post_id: Post_id,
            },
            success: function(response) {
                $comment_container.html(response.User_Comment)   
            }
        })
    }
    
    $('#response').on('submit', '#comment_form', function(event) {
        event.preventDefault()
        $comment_content = $(this).find('#comment_input');
        $comment_val = $comment_content.val();
        $post_id = $(this).find('input[name="post_id"]').val();
        sendComment($comment_val, $post_id)
        $comment_content.val('');
    })

    function sendComment($comment_content, $post_id) {
        $.ajax({
            url: '../User/Handler/SendComment.php',
            type: 'POST',
            data: {
                post_id: $post_id,
                comment_content: $comment_content
            },
            success: function(response){
                loadComments($post_id);
            },
            error: function(xhr, error) {
                console.log('failed 1' + xhr.status + error)
            }
        })
    }
})