<?php

include "doctor_header.php";                 
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Messaging</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  


    <!DOCTYPE html>
<html lang="en">
<head>
 <style>

.container {
    display: flex;
    height: 100vh;
    background-color: #4e94ab;
}

.users {
    width: 20%;
    padding: 20px;
    background-color: #5eafd7;
    overflow-y: auto;
}
.users h2 {
    text-align: center;
}

.users ul {
    list-style-type: none;
    padding: 0;
}

.users li {
    padding: 10px;
    cursor: pointer;
}

.users li:hover {
    background-color: #e6e6e6;
}

.users li.active {
    background-color: #3399ff;
    color: #fff;
}

.messages {
    flex-grow: 1;
    padding: 20px;
    background-color: #ed97b2;
    overflow-y: auto;
}

.messages h2 {
    text-align: center;
}

#messageContainer {
    max-height: 400px;
    overflow-y: auto;
    padding: 10px;
    border: 1px solid #ccc;
}

.message {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
    background-color: #fff;
}

input[type="text"] {
    width: 70%;
    padding: 8px;
}

button {
    padding: 8px;
    cursor: pointer;
    background-color: #4CAF50;
    color: #fff;
    border: none;
}

button:hover {
    background-color: #45a049;
}

.empty-message {
    text-align: center;
    color: #555;
}

 </style>
</head>



    <div class="container">
        <div class="users">
            <h2>Users</h2>
            <ul id="userList"></ul>
        </div>
        <div class="messages">
            <h2>Messages</h2>
            <div id="messageContainer"></div>
            <div>
                <input type="text" id="messageInput" placeholder="Type your message">
                <button onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
   // scripts.js

$(document).ready(function() {
    // Load users initially
    loadUsers();

    // Set interval to refresh messages every 5 seconds (for demonstration)
    setInterval(function() {
        var activeUserId = $('#userList .user.active').data('userid');
        loadMessages(activeUserId);
    }, 5000);
});

function loadUsers() {
    // Implement AJAX to load users
    $.ajax({
        type: 'GET',
        url: 'loadUsers.php',
        success: function(response) {
            $('#userList').html(response);
            // Load the first user's messages by default
            var firstUserId = $('#userList .user:first').data('userid');
            loadMessages(firstUserId);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function loadMessages(receiverId) {
    // Implement AJAX to load messages based on the selected user (receiverId)
    $.ajax({
        type: 'GET',
        url: 'loadMessages.php',
        data: { receiver_id: receiverId },
        success: function(response) {
            $('#messageContainer').html(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function sendMessage() {
    var senderId = 1; // Replace with the actual sender's ID
    var receiverId = $('#userList .user.active').data('userid');
    var message = $('#messageInput').val();

    $.ajax({
        type: 'POST',
        url: 'sendMessage.php',
        data: { sender_id: senderId, receiver_id: receiverId, message: message },
        success: function(response) {
            console.log(response);
            // Reload messages or update the UI as needed
            loadMessages(receiverId);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function loadChat() {
    var receiverId = document.getElementById("receiverSelect").value;

    // Use AJAX to fetch chat messages based on the selected receiverId
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the message container with the retrieved messages
            document.getElementById("messageContainer").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "get_chat_messages.php?receiverId=" + receiverId, true);
    xhr.send();
}


    </script>




<?php

include "footer.php";                 
?>
