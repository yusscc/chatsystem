document.getElementById('send-message').addEventListener('click', function() {
    const messageText = document.getElementById('message-text').value;
    if (messageText.trim() === '') return;

    const messagesContainer = document.getElementById('messages');
    const newMessage = document.createElement('div');
    newMessage.classList.add('message', 'sent');
    newMessage.innerHTML = `
        <div class="message-bubble">
            <p>${messageText}</p>
            <span class="timestamp">${new Date().toLocaleTimeString()}</span>
        </div>
    `;
    messagesContainer.appendChild(newMessage);
    document.getElementById('message-text').value = '';
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
});

document.querySelectorAll('.conversation').forEach(item => {
    item.addEventListener('click', function() {
        const chatHeader = document.getElementById('chat-header');
        chatHeader.innerHTML = `
            <img src="profile2.jpg" class="header-img" alt="profile2">
            <span>Jane Smith</span>
            <span class="status">Online</span>
        `;
        const messagesContainer = document.getElementById('messages');
        messagesContainer.innerHTML = `
            <div class="message received">
                <div class="message-bubble">
                    <p>Hello John, how are you?</p>
                    <span class="timestamp">10:45 AM</span>
                </div>
            </div>
            <div class="message sent">
                <div class="message-bubble">
                    <p>I'm good, thanks! How about you?</p>
                    <span class="timestamp">10:46 AM</span>
                </div>
            </div>
        `;
    });
});
