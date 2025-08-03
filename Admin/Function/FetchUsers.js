$(document).ready(()=>{
    console.log('Connected')

    $.ajax({
        url: '../Admin/Handler/RetrieveUsers.php',
        type: 'GET',
        dataType: 'Json',
        success: function(response) {
            $('#users_container').html(response.users)
            console.log('Success')
        }
    })
})