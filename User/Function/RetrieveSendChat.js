$(document).ready(function () {
    const chatContainer = $('#chatContents'); //Reference to chat container
    const scrollContainer = $('#PublicChatBody'); //reference to chat main body
    const bannedWords = [
        "porn"
    ];
    let page = 0;
    let isLoading = false;
    let lastChatId = 0; // hold last message data id 

    //Do after sending message
    function scrollToBottom() {
        const container = scrollContainer[0];
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    }

    //Filter message
    function inappropriateWordChecker(content) {
        return bannedWords.some(word =>
            content.toLowerCase().includes(word.toLowerCase())
        );
    }

    //dynamically load content through ajax
    function loadChats() {
        if (isLoading) return;
        isLoading = true;

        $.ajax({
            url: "../User/Handler/RetrieveMessage.php",
            type: "GET",
            dataType: "json",
            data: {
                last_chat_id: lastChatId,
                Page: page,
            },
            success: function (response) {
                if (response.content) {
                    chatContainer.append(response.content);
                    const lastMsg = chatContainer.children().last();
                    lastChatId = lastMsg.data('chat-id') || lastChatId;
                    scrollToBottom();
                }
            },
            error: function (xhr, error) {
                //  console.log('ERROR' + xhr.status + "  " + xhr)
            },
            complete: function () {
                isLoading = false;
                loadChats();
            },
            timeout: 600000
        });
    }

    function sendChat(content) {
        if (!content || inappropriateWordChecker(content)) {
            alert("Please be mindful with your words.");
            return;
        }

        $.ajax({
            url: "../User/Handler/SendMessage.php",
            type: "POST",
            data: { chatContent: content },
            success: function () {
                $('#IPT_chatContent').val('');
            },
            error: function (xhr, error) {
                console.error(`Error ${xhr.status} - ${error}`);
            },
            complete: function () {
                setTimeout(scrollToBottom, 300);
            }
        });
    }

    $('#BTN_chatSend').on('click', function () {
        const content = $('#IPT_chatContent').val().trim();
        if (content === "") return;
        sendChat(content);
    });

    $('#PublicChatBody').on('scroll', function() {
        let scrollTop = $(this).scrollTop();
        console.log(scrollTop)
        if (scrollTop <= 0) {
            console.log("TEST TOP")
            console.log(page)

            page++
            loadChats()
        }
    })

    loadChats();
});
