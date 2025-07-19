const public_chat = $('.public_chat');
const tab_menu = $('.tab_menu');
const tab_content = $('.tab_content');

public_chat.on('click', (e)=>{
    $('#col3').addClass('d-block')
    $('#col3').removeClass('d-none')

    $('#col1').addClass('d-none')
    $('#col1').removeClass('d-block')

    $('.col2').addClass('d-none')
    $('.col2').removeClass('d-block')
    setTimeout(scrollToBottom(), 500);
})

tab_menu.on('click', (e)=>{
    $('#col1').addClass('d-block')
    $('#col1').removeClass('d-none')

    $('#col3').addClass('d-none')
    $('#col3').removeClass('d-block')

    $('.col2').addClass('d-none')
    $('.col2').removeClass('d-block')
})

tab_content.on('click', (e)=>{
    $('.col2').addClass('d-block')
    $('.col2').removeClass('d-none')

    $('#col1').addClass('d-none')
    $('#col1').removeClass('d-block')

    $('#col3').addClass('d-none')
    $('#col3').removeClass('d-block')
})

$('button[name="postFilter"]').on('click', (e)=>{
    $('.col2').addClass('d-block')
    $('.col2').removeClass('d-none')

    $('#col1').addClass('d-none')
    $('#col1').removeClass('d-block')

    $('#col3').addClass('d-none')
    $('#col3').removeClass('d-block')
})