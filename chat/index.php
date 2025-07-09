<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat System</title>
  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f4f4f9;
}

.chat-container {
  width: 350px;
  height: 500px;
  display: flex;
  flex-direction: column;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #fff;
}

.chat-header {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  text-align: center;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.chat-box {
  flex: 1;
  padding: 10px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
}

.messages {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.message {
  max-width: 80%;
  padding: 10px;
  border-radius: 5px;
  font-size: 14px;
}

.user-message {
  background-color: #DCF8C6;
  align-self: flex-end;
}

.bot-message {
  background-color: #E1E1E1;
  align-self: flex-start;
}

.input-area {
  display: flex;
  padding: 10px;
  border-top: 1px solid #ccc;
}

#chat-input {
  flex: 1;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
}

#send-btn {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
}

#send-btn:hover {
  background-color: #45a049;
}

  </style>
</head>
<body>
  <div class="chat-container">
    <div class="chat-header">
      <h2>Chat</h2>
    </div>
    <div class="chat-box">
      <div class="messages">
        <div class="message user-message">
          <p>Hello!</p>
        </div>
        <div class="message bot-message">
          <p>Hi, how can I help you?</p>
        </div>
        <div class="message user-message">
          <p>Can you tell me a joke?</p>
        </div>
        <div class="message bot-message">
          <p>Sure! Why don't skeletons fight each other? They don't have the guts.</p>
        </div>
      </div>
    </div>
    <div class="input-area">
      <input type="text" placeholder="Type a message..." id="chat-input">
      <button id="send-btn">Send</button>
    </div>
  </div>
</body>
</html>
