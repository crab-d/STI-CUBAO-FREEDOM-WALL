$(document).ready(()=>{

    $('.content').addClass('d-none')
    $('#admin_dashboard').addClass('d-block').removeClass('d-none')


    $('#filter_btn_container').on('click', 'button', function() {
        let click_filter = $(this).closest('button').val()
        changeContent(click_filter)
    })  
    
    function changeContent(filter) {
        switch (filter) {
            case "user_management":
                $('.content').addClass('d-none')
                $(`#${filter}`).addClass('d-block').removeClass('d-none')
                break
            case "content_management":
                $('.content').addClass('d-none')
                $(`#${filter}`).addClass('d-block').removeClass('d-none')
                break
            case "content_approval":
                $('.content').addClass('d-none')
                $(`#${filter}`).addClass('d-block').removeClass('d-none')
                break
            case "content_report":
                $('.content').addClass('d-none')
                $(`#${filter}`).addClass('d-block').removeClass('d-none')
                break
            default:
                $('.content').addClass('d-none')
                $('#admin_dashboard').addClass('d-block').removeClass('d-none')
        }
    }


})