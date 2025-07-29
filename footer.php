
<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <div class="footer-logo">
                    
                    <h2 class="gdg-gradient-text">GDG on Campus</h2>
                </div>
                <p>Connecting students with Google Developer technologies and building a community of passionate tech enthusiasts at Manipal University Jaipur.</p>
                <div class="social-media">
                    <a href="#" class="social-blue"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-red"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-yellow"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-green"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> Manipal University Jaipur, Rajasthan, India</p>
                    <p><i class="fas fa-envelope"></i> gdgoncampus@muj.manipal.edu</p>
                    <p><i class="fas fa-phone"></i> +91 1234567890</p>
                </div>
            </div>
            
            <div class="footer-section quicklinks">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            
            <div class="footer-section newsletter">
                <h3>Subscribe</h3>
                <p>Stay updated with our latest events and news</p>
                <form>
                    <input type="email" placeholder="Enter your email">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
    
            <p>© 2025 Google Developer Group on Campus - Manipal University Jaipur. All rights reserved.</p>

<p>This website is not an official Google product. GDG on Campus is an independent group.</p>
        </div>
    </div>
</footer>
  
    <!-- Chatbot Toggle Button -->
    <div class="chatbot-toggle" id="chatbot-toggle">
         <i class="fas fa-robot"></i>
            <div class="blink-led"></div>
    </div>

    <!-- Chatbot Container -->
    <div class="chatbot-container" id="chatbot-container">
        <div class="chatbot-header">
            <h2><img src="../gdsc/gdg-logo.png" alt="GDG Logo"> GDG Campus Assistant</h2>
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
<script src="./script.js"></script>
</html>