$(document).ready(()=>{ 
    $('#response').on('click', '.reply-comment', function() {
        let reply_button_id = $(this).closest('.reply-comment').data('comment-id');
        let post_id = $(this).closest('.reply-comment').data('post-id');
        let display_name = $(this).closest('.reply-comment').data('display-name');

        //Initial reference after clicking reply from comment
        let reply_container = $('#reply-container-'+reply_button_id)
        reply_container.addClass('d-block').removeClass('d-none')

        let reply_input = reply_container.find('.reply_input');
        reply_input.val('@' + display_name + ' ');

        console.log(display_name);
        console.log(reply_button_id);
        console.log(reply_input);

        $('#response').off('submit', '#reply-form-'+reply_button_id).on('submit','#reply-form-'+reply_button_id , function(e){
            e.preventDefault();

            //Since reply isnt being triggered, reference the input when user submit again
            let reply_container = $('#reply-container-'+reply_button_id)
            let reply_input = reply_container.find('.reply_input');
            
            if (reply_input.val().trim() !== ''){
                sendReplyComment(reply_button_id, reply_input.val(), post_id)
                reply_input.val('')
            } else {
                return
            }
        })
    })

    function sendReplyComment(reply_button_id, reply_input, post_id) {
        $.ajax({
                url: '../User/Handler/ReplyComment.php',
                type: 'POST',
                data: {
                    post_id: post_id,
                    comment_id: reply_button_id,
                    reply_content: reply_input
                },
                success: function(response){
                    loadComments(post_id,reply_button_id)
                },
                error: function(){
                    console.log('failed')
                }
            })
    }


    function loadComments(Post_id,reply_button_id) {
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
                let reply_container = $('#reply-container-'+reply_button_id)

                setTimeout(()=>{
                reply_container.addClass('d-block').removeClass('d-none')
                    
                },500)

            }
        })
    }

})  