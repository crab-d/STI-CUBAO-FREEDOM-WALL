$(document).ready(function() {
    let Page = 1;
    let isLoading = false;

    function loadChats() {
        if (isLoading) return;
        isLoading = true;
        
        $.ajax({
            url: '../User/Function/RetrieveMessage.php?t=' + new Date().getTime(),
            type: 'GET',
            success: function(response) { 
                $('#chatContents').html(response);
                console.log('Chats loaded!');
            },
            error: function(xhr, error) {
                $('#chatContents').html('Error ' + xhr.status + ' - ' + error);
                console.log('Chat not load');
            }
        })
    }

    function sendChat(ChatContent) {
        console.log('sendChat log');
        $.ajax({
            url: '../User/Function/SendMessage.php',
            type: 'POST',
            
            data: {
                chatContent: ChatContent,
            },
            success: function() {
                $('#chatContents').val('');
                setTimeout(function () {
                    loadChats();
                }, 3000);
            },
            error: function(xhr, error) {
                $('#chatContents').html('Error ' + xhr.status + ' - ' + error);
                console.log('failed log');
            }
        })
    }

         
   

    $('#BTN_chatSend').click(function() {
        console.log('click')
        let chatContent = $('#IPT_chatContent').val().trim();
        if (chatContent === '') return;
        if (inappropriateWorkChecker(chatContent)) {
            return '<div class="alert alert-danger">  Please be mindful with your words. </div> ';
        }
        sendChat(chatContent);
    });

    loadChats()
    function inappropriateWorkChecker(chatContent){
        let bannedWord = [
            // English sexual/inappropriate
            'sex', 's3x', 'porn', 'pornhub', 'xxx', 'nude', 'naked', 'boobs', 'tits',
            'pussy', 'dick', 'cock', 'penis', 'vagina', 'anal', 'oral', 'cum', 'jerk', 'jerking', 'masturbate', 'masturbation', 'orgasm', 'hentai',

            // Filipino sexual/inappropriate
            'kantot', 'kantutan', 'tite', 'pepe', 'puke', 'putotoy', 'etits', 'ari', 'utong',

            // Filipino curse words
            'gago', 'tanga', 'ulol', 'bobo', 'punyeta', 'lintik', 'leche', 'bwisit', 'hayop', 'putangina', 'pakshet', 'putang ina', 'putang-ina',

            // English curse/swears
            //'fuck', 'shit', 'bitch', 'asshole', 'bastard', 'dumbass', 'slut', 'whore', 'fucker', 'motherfucker', 'piss', 'crap', 'damn',

            // Spelling variants / leetspeak
            //'fck', 'fuk', 'f*ck', 'f@ck', 'sh1t', 'b1tch', 'b!tch', 'fckr', 's3x', 'p0rn', 'kntt', 'pnus', 'pniss'
            ];

        let CheckWord = bannedWord.some(word => 
            chatContent.toLowerCase().includes(word.toLowerCase())
        )
        
        if (CheckWord) {
            return true;
        } else {
            return false;
        }
    }

 

})