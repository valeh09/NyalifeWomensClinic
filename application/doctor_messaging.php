<?php

include "doctor_header.php";                 
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
          <h1>Messaging</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  

<head>
    <style>
     
.container {
    display: flex;
    justify-content: space-around;
    margin: 20px;
}

.user-selection, .messages {
    width: 45%;
    padding: 20px;
    background-color: #add8e6; /* Light Blue */
    border-radius: 10px;
}

h2 {
    color: #000080; /* Navy Blue */
}

#recipientSelect {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

#messageContainer {
    height: 300px;
    overflow-y: scroll;
    border: 1px solid #000080; /* Navy Blue */
    padding: 10px;
    border-radius: 5px;
}

.message {
    margin-bottom: 10px;
}

    </style>
</head>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Messaging System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="user-selection">
        <h2>Select Recipient</h2>
        <select id="recipientSelect" onchange="loadMessages()">
            <!-- Populate this dropdown with staff names from your database -->
            <?php
           include "config.php";
            $result = $conn->query("SELECT id, first_name FROM staff");

            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['first_name']}</option>";
            }

            $conn->close();
            ?>
        </select>
    </div>

    <div class="messages">
        <h2>Messages</h2>
        <div id="messageContainer">
            <!-- Messages will be loaded here using JavaScript -->
        </div>

        <div class="send-message">
            <h2>Send Message</h2>
            <form onsubmit="sendMessage(); return false;">
                <textarea id="messageInput" placeholder="Type your message here"></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>

<script src="scripts.js"></script>
</body>
</html>

</div>





<script>
 let recipientId = 0;
let lastTimestamp = 0;

function loadMessages() {
    recipientId = document.getElementById('recipientSelect').value;
    const messageContainer = document.getElementById('messageContainer');

    // Fetch and display received messages
    fetchReceivedMessages()
        .then(messages => {
            const newMessages = messages.filter(message => message.timestamp > lastTimestamp);
            if (newMessages.length > 0) {
                // Notify the user about new messages
                notifyUser();
            }

            messageContainer.innerHTML = '';
            messages.forEach(message => {
                appendMessage(message.message, 'received', message.timestamp, message.sender);
            });

            // Update the last timestamp to the latest message
            if (messages.length > 0) {
                lastTimestamp = messages[messages.length - 1].timestamp;
            }
        })
        .catch(error => {
            console.error('Error loading messages:', error);
        });
}

function fetchReceivedMessages() {
    return new Promise((resolve, reject) => {
        // Replace with actual AJAX or fetch API call to retrieve received messages from the database
        fetch('get_messages.php?recipient_id=' + recipientId)
            .then(response => response.json())
            .then(data => resolve(data))
            .catch(error => reject(error));
    });
}

function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const messageText = messageInput.value.trim();

    if (messageText !== '') {
        // Replace with actual AJAX or fetch API call to send the message to the database
        fetch('send_message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                recipient_id: recipientId,
                message: messageText,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Append the sent message to the message container
            appendMessage(messageText, 'sent', data.timestamp, 'You');
            // Clear the message input
            messageInput.value = '';
        })
        .catch(error => console.error('Error sending message:', error));
    }
}

function appendMessage(message, messageType, timestamp, sender) {
    const messageContainer = document.getElementById('messageContainer');
    const messageElement = document.createElement('div');
    messageElement.className = messageType === 'sent' ? 'sent-message' : 'received-message';
    messageElement.innerHTML = `<p>${message}</p><span class="timestamp">${formatTimestamp(timestamp)}</span><span class="sender">${sender}</span>`;
    messageContainer.appendChild(messageElement);
}

function formatTimestamp(timestamp) {
    const date = new Date(timestamp);
    const options = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

function notifyUser() {
    // Implement your notification logic here
    // For simplicity, an alert is used in this example
    alert('New Message!');
}

// Periodically check for new messages (every 30 seconds in this example)
setInterval(loadMessages, 30000);

// Load messages for the default selected recipient on page load
loadMessages();

</script>





<?php

include "footer.php";                 
?>
