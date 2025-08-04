$('#users_container').on('click', '#profile', function() {
    $user_id = $(this).closest('.user-data').data('user-id')
    $.ajax({
        url: '../Admin/Handler/RetrieveUserProfileInfo.php',
        dataType: 'Json',
        type: 'GET',
        data: {
            user_id: $user_id
        },
        success: function(response){
            $('#profile_color').css("background-color", response.user_profile_color)
            $('#profile_full_name').html(response.user_fullname)
            $('#profile_display_name').html(response.user_display_name)
            $('#profile_total_post span').html(response.user_total_post)
        },
        error: function(xhr){
            console.log('stats ' + xhr.status)
            console.log('a ' + xhr.responseText)

            console.log('failed')

        }
    })
})
