$(document).ready(()=>{
    let body = $('#body')
    setTimeout(()=>{
        scrollToBottom();
        body.css('opacity', 1)
    }, 1000);
})

function scrollToBottom() {
    let container = $('#PublicChatBody')[0]
        let scrollHeight = container.scrollHeight;
        container.scrollTop = scrollHeight;
}
