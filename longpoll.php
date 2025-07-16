<!DOCTYPE html>
<html>
<head>
    <title>AJAX Chat</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        #messages { border: 1px solid #ccc; padding: 10px; height: 300px; overflow-y: auto; }
        .msg { margin: 5px 0; }
    </style>
</head>
<body>
    <h2>AJAX Chat (No Refresh)</h2>
    <div id="messages"></div>

    <form id="chatForm">
        <input type="text" id="messageInput" placeholder="Type a message" required>
        <button type="submit">Send</button>
    </form>

    <script>
        let lastId = 0;

        // Poll for new messages
        function pollServer() {
            fetch('chat.php?poll=1&last_id=' + lastId)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'ok' && data.messages.length > 0) {
                        const msgBox = document.getElementById('messages');
                        data.messages.forEach(msg => {
                            const div = document.createElement('div');
                            div.className = 'msg';
                            div.textContent = msg.message;
                            msgBox.appendChild(div);
                            lastId = msg.id;
                        });
                        msgBox.scrollTop = msgBox.scrollHeight;
                    }
                    pollServer(); // Continue polling
                })
                .catch(() => setTimeout(pollServer, 2000)); // Retry on error
        }

        // Submit message using AJAX
        document.getElementById('chatForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const input = document.getElementById('messageInput');
            const message = input.value.trim();
            if (message === '') return;

            fetch('chat.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'message=' + encodeURIComponent(message)
            }).then(() => {
                input.value = '';
            }).catch(err => console.error('Send failed', err));
        });

        pollServer(); // Start polling
    </script>
</body>
</html>
