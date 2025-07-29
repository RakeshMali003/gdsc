<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDG Campus Floating Chatbot</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        body {
            background-color: #121212;
            color: #e0e0e0;
            min-height: 100vh;
            position: relative;
            padding: 20px;
        }
        .page-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
            min-height: 300px;
        }
        h1 {
            margin-bottom: 20px;
            color: #4285f4;
        }
        p {
            margin-bottom: 15px;
            line-height: 1.6;
        }
        /* Chatbot Styles */
        .chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #4285f4;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .chatbot-toggle:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }
        .chatbot-toggle img {
            width: 32px;
            height: 32px;
        }
        .chatbot-container {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 500px;
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            z-index: 999;
            transform: scale(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-out;
            opacity: 0;
            visibility: hidden;
        }
        .chatbot-container.active {
            transform: scale(1);
            opacity: 1;
            visibility: visible;
        }
        .chatbot-header {
            background-color: #4285f4;
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chatbot-header h2 {
            margin: 0;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }
        .chatbot-header img {
            width: 24px;
            height: 24px;
            margin-right: 8px;
        }
        .close-chat {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .close-chat:hover {
            opacity: 0.8;
        }
        .chatbot-status {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            background-color: #252525;
            font-size: 0.8rem;
            color: #aaa;
            border-bottom: 1px solid #333;
        }
        .status-indicator {
            width: 8px;
            height: 8px;
            background-color: #4CAF50;
            border-radius: 50%;
            margin-right: 6px;
        }
        .chatbot-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background-color: #121212;
            display: flex;
            flex-direction: column;
        }
        .message-wrapper {
            display: flex;
            margin-bottom: 16px;
            position: relative;
        }
        .bot-icon {
            width: 30px;
            height: 30px;
            background-color: #4285f4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            font-weight: bold;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }
        .message-content {
            flex: 1;
        }
        .message-bubble {
            padding: 10px 12px;
            background-color: #2c2c2c;
            border-radius: 18px;
            border-top-left-radius: 5px;
            color: #e0e0e0;
            display: inline-block;
            max-width: 100%;
            word-break: break-word;
        }
        .user-wrapper {
            justify-content: flex-end;
        }
        .user-wrapper .message-bubble {
            background-color: #4285f4;
            color: white;
            border-radius: 18px;
            border-top-right-radius: 5px;
        }
        .message-time {
            font-size: 0.6rem;
            color: #777;
            margin-top: 4px;
        }
        .typing-indicator {
            display: flex;
            padding: 10px;
            background-color: #2c2c2c;
            border-radius: 18px;
            border-top-left-radius: 5px;
            width: fit-content;
        }
        .typing-indicator span {
            height: 7px;
            width: 7px;
            background-color: #a0a0a0;
            border-radius: 50%;
            display: inline-block;
            margin: 0 2px;
            animation: bounce 1.3s linear infinite;
        }
        .typing-indicator span:nth-child(2) { animation-delay: 0.15s; }
        .typing-indicator span:nth-child(3) { animation-delay: 0.3s; }
        @keyframes bounce {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-4px); }
        }
        .chatbot-input {
            padding: 10px;
            background-color: #252525;
            border-top: 1px solid #333;
            display: flex;
        }
        .chatbot-input input {
            flex: 1;
            padding: 10px 12px;
            border: none;
            border-radius: 20px;
            background-color: #333;
            color: #e0e0e0;
            font-size: 0.9rem;
        }
        .chatbot-input input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.5);
        }
        .chatbot-input button {
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin-left: 8px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .chatbot-input button:hover {
            background-color: #5295f5;
        }
        .suggestions {
            display: flex;
            padding: 10px;
            background-color: #1a1a1a;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: thin;
            scrollbar-color: #555 #1a1a1a;
        }
        .suggestions::-webkit-scrollbar {
            height: 4px;
        }
        .suggestions::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        .suggestions::-webkit-scrollbar-thumb {
            background-color: #555;
            border-radius: 20px;
        }
        .suggestion-chip {
            background-color: #333;
            color: #e0e0e0;
            padding: 6px 12px;
            border-radius: 15px;
            margin-right: 8px;
            font-size: 0.8rem;
            cursor: pointer;
            flex-shrink: 0;
            border: 1px solid #444;
        }
        .suggestion-chip:hover {
            background-color: #444;
            border-color: #555;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .new-message-animation {
            animation: pulse 1s ease infinite;
        }
        @media (max-width: 600px) {
            .chatbot-container {
                width: calc(100% - 40px);
                height: 60vh;
                bottom: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Page Content (Sample) -->
    <div class="page-content">
        <h1>GDG Campus Community</h1>
        <p>Welcome to the Google Developer Group Campus community. This is where students and developers connect to learn and grow together.</p>
        <p>Explore our resources and upcoming events to enhance your development skills.</p>
    </div>

    <!-- Chatbot Toggle Button -->
    <div class="chatbot-toggle" id="chatbot-toggle">
         <i class="fas fa-robot"></i>
            <div class="blink-led"></div>
    </div>

    <!-- Chatbot Container -->
    <div class="chatbot-container" id="chatbot-container">
        <div class="chatbot-header">
            <h2><img src="/api/placeholder/24/24" alt="GDG Logo"> GDG Campus Assistant</h2>
            <button class="close-chat" id="close-chat">×</button>
        </div>
        <div class="chatbot-status">
            <div class="status-indicator"></div>
            <span id="datetime">Online • Wednesday, May 21, 2025</span>
        </div>
        <div class="chatbot-messages" id="chat-messages">
            <div class="message-wrapper">
                <div class="bot-icon">G</div>
                <div class="message-content">
                    <div class="message-bubble">
                        Hello! I'm your GDG Campus Assistant. How can I help you today?
                    </div>
                    <div class="message-time">Just now</div>
                </div>
            </div>
        </div>
        <div class="suggestions" id="suggestions">
            <div class="suggestion-chip">What is GDG on Campus?</div>
            <div class="suggestion-chip">Is there any membership fee?</div>
            <div class="suggestion-chip">Who can join?</div>
            <div class="suggestion-chip">What events do you organize?</div>
            <div class="suggestion-chip">Do I need prior experience?</div>
        </div>
        <div class="chatbot-input">
            <input type="text" id="message-input" placeholder="Type your message here...">
            <button id="send-button">➤</button>
        </div>
    </div>

    <script>
        // Common questions and answers database
        const qaDatabase = {
            "what is gdg on campus": "GDG on Campus is a community-driven program by Google Developer Groups (GDG), designed for students and developers on university campuses to connect, learn, and grow together.",
            "is there any membership fee": "No, GDG on Campus is completely free to join. All events, workshops, and activities are usually free as well.",
            "who can join gdg on campus": "GDG on Campus is open to all students, developers, and tech enthusiasts interested in learning more about Google technologies.",
            "do i need prior experience to participate in gdg events": "No, prior experience is not required. GDG on Campus welcomes people at all levels—beginners to experienced developers.",
            "what kind of events does gdg on campus organize": "GDG on Campus organizes a variety of events, including workshops, bootcamps, hackathons, tech talks, and networking events.",
            "can i become a leader of a gdg on campus chapter": "Yes! If you're passionate about technology and community building, you can become a chapter lead.",
            "how do i join gdg on campus": "Joining GDG on Campus is simple! You can find your local chapter through the GDG website or social media platforms, join their community page, and start attending events.",
            "what technologies do you focus on": "GDG on Campus primarily focuses on Google technologies, including Android, Flutter, Firebase, Google Cloud Platform, TensorFlow, Angular, and other Google developer tools.",
            "hello": "Hello there! How can I assist you with GDG on Campus today?",
            "hi": "Hi! Welcome to the GDG Campus Assistant. How may I help you?",
            "hey": "Hey there! I'm here to answer any questions about GDG on Campus. What would you like to know?",
            "what time is it": "currentTime",
            "what's the date": "currentDate",
            "what day is it": "currentDay",
            "good morning": "Good morning! How can I help you with GDG on Campus today?",
            "good afternoon": "Good afternoon! How can I assist you with GDG Campus information?",
            "good evening": "Good evening! Feel free to ask any questions about GDG on Campus.",
            "thank you": "You're welcome! If you have any more questions about GDG on Campus, feel free to ask.",
            "thanks": "No problem! I'm here to help with any GDG Campus inquiries.",
            "bye": "Goodbye! Have a great day. Feel free to return if you have more questions about GDG on Campus."
        };

        // DOM elements
        const chatbotToggle = document.getElementById('chatbot-toggle');
        const chatbotContainer = document.getElementById('chatbot-container');
        const closeChat = document.getElementById('close-chat');
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');
        const datetimeElement = document.getElementById('datetime');

        // Toggle chatbot visibility
        chatbotToggle.addEventListener('click', () => {
            chatbotContainer.classList.add('active');
            chatbotToggle.classList.remove('new-message-animation');
        });

        closeChat.addEventListener('click', () => {
            chatbotContainer.classList.remove('active');
        });

        // Update date and time
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                month: 'long', 
                day: 'numeric', 
                year: 'numeric'
            };
            datetimeElement.textContent = `Online • ${now.toLocaleDateString('en-US', options)}`;
        }

        // Initial update and set interval
        updateDateTime();
        setInterval(updateDateTime, 60000);

        // Format time for messages
        function getMessageTime() {
            const now = new Date();
            return now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
        }

        // Add user message to chat
        function addUserMessage(content) {
            const messageTime = getMessageTime();
            
            // Create message wrapper
            const messageWrapper = document.createElement('div');
            messageWrapper.classList.add('message-wrapper', 'user-wrapper');
            
            // Create message content
            const messageContent = document.createElement('div');
            messageContent.classList.add('message-content');
            
            // Create message bubble
            const messageBubble = document.createElement('div');
            messageBubble.classList.add('message-bubble');
            messageBubble.textContent = content;
            
            // Create time element
            const timeElement = document.createElement('div');
            timeElement.classList.add('message-time');
            timeElement.textContent = messageTime;
            
            // Assemble elements
            messageContent.appendChild(messageBubble);
            messageContent.appendChild(timeElement);
            messageWrapper.appendChild(messageContent);
            
            // Append to chat
            chatMessages.appendChild(messageWrapper);
            
            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        // Add bot message to chat
        function addBotMessage(content) {
            const messageTime = getMessageTime();
            
            // Create message wrapper
            const messageWrapper = document.createElement('div');
            messageWrapper.classList.add('message-wrapper');
            
            // Create bot icon
            const botIcon = document.createElement('div');
            botIcon.classList.add('bot-icon');
            botIcon.textContent = 'G';
            
            // Create message content
            const messageContent = document.createElement('div');
            messageContent.classList.add('message-content');
            
            // Create message bubble
            const messageBubble = document.createElement('div');
            messageBubble.classList.add('message-bubble');
            messageBubble.innerHTML = content;
            
            // Create time element
            const timeElement = document.createElement('div');
            timeElement.classList.add('message-time');
            timeElement.textContent = messageTime;
            
            // Assemble elements
            messageContent.appendChild(messageBubble);
            messageContent.appendChild(timeElement);
            messageWrapper.appendChild(botIcon);
            messageWrapper.appendChild(messageContent);
            
            // Append to chat
            chatMessages.appendChild(messageWrapper);
            
            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // If chat is not open, add notification animation to toggle button
            if (!chatbotContainer.classList.contains('active')) {
                chatbotToggle.classList.add('new-message-animation');
            }
        }

        // Show typing indicator
        function showTypingIndicator() {
            const wrapper = document.createElement('div');
            wrapper.classList.add('message-wrapper');
            wrapper.id = 'typing-wrapper';
            
            const botIcon = document.createElement('div');
            botIcon.classList.add('bot-icon');
            botIcon.textContent = 'G';
            
            const indicator = document.createElement('div');
            indicator.classList.add('typing-indicator');
            indicator.innerHTML = '<span></span><span></span><span></span>';
            
            wrapper.appendChild(botIcon);
            wrapper.appendChild(indicator);
            chatMessages.appendChild(wrapper);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Remove typing indicator
        function removeTypingIndicator() {
            const indicator = document.getElementById('typing-wrapper');
            if (indicator) {
                indicator.remove();
            }
        }

        // Process user message and get response
        function processMessage(message) {
            const cleanedMessage = message.toLowerCase().trim();
            
            // Check for specific time/date requests
            if (cleanedMessage.includes("time") || qaDatabase[cleanedMessage] === "currentTime") {
                const now = new Date();
                return `The current time is ${now.toLocaleTimeString()}.`;
            }
            
            if (cleanedMessage.includes("date") || qaDatabase[cleanedMessage] === "currentDate") {
                const now = new Date();
                return `Today's date is ${now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}.`;
            }
            
            if (cleanedMessage.includes("day") || qaDatabase[cleanedMessage] === "currentDay") {
                const now = new Date();
                return `Today is ${now.toLocaleDateString('en-US', { weekday: 'long' })}.`;
            }
            
            // Check database for exact match
            if (qaDatabase[cleanedMessage]) {
                return qaDatabase[cleanedMessage];
            }
            
            // Check for partial matches
            for (const key in qaDatabase) {
                if (cleanedMessage.includes(key) || key.includes(cleanedMessage)) {
                    return qaDatabase[key];
                }
            }
            
            // Check for keywords
            if (cleanedMessage.includes("gdg")) {
                return "GDG on Campus is Google's program for university students to learn about Google technologies and build a community of developers on campus. Would you like to know more about specific aspects of GDG on Campus?";
            }
            
            if (cleanedMessage.includes("event")) {
                return qaDatabase["what kind of events does gdg on campus organize"];
            }
            
            if (cleanedMessage.includes("join")) {
                return qaDatabase["how do i join gdg on campus"];
            }
            
            if (cleanedMessage.includes("fee") || cleanedMessage.includes("cost") || cleanedMessage.includes("price")) {
                return qaDatabase["is there any membership fee"];
            }
            
            // Default response
            return "I'm not sure I understand your question. Could you please rephrase it or ask something related to GDG on Campus?";
        }

        // Send message function
        function sendMessage() {
            const message = messageInput.value.trim();
            if (message) {
                // Add user message
                addUserMessage(message);
                messageInput.value = '';
                
                // Show typing indicator
                showTypingIndicator();
                
                // Process after a slight delay to simulate thinking
                setTimeout(() => {
                    removeTypingIndicator();
                    const response = processMessage(message);
                    addBotMessage(response);
                }, 1000 + Math.random() * 1000);
            }
        }

        // Event listeners
        messageInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        sendButton.addEventListener('click', sendMessage);

        // Handle suggestion chips
        document.querySelectorAll('.suggestion-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                messageInput.value = chip.textContent;
                sendMessage();
            });
        });

        // Simulate a welcome message notification after 3 seconds
        setTimeout(() => {
            if (!chatbotContainer.classList.contains('active')) {
                chatbotToggle.classList.add('new-message-animation');
            }
        }, 3000);
    </script>
</body>
</html>