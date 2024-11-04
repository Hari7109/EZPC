<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EZPC</title>
        <link rel="icon" type="image/x-icon" href="./img/icon1.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

<header >
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="../index.php" class="text-xl font-bold text-blue-600">Ezpc</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="../index.php" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="../about.html" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="../shop.php" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Shop</a>
                        <a href="../contact.html" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
</header>

<body class="">
    <div class="bg-gray-100 flex min-h-screen  items-center justify-center">
    <div class="w-full   max-w-lg p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold mb-4 text-center text-blue-600">Live Chat</h2>

        <!-- Chat Box -->
        <div id="chat-box" style="height: 400px;" class=" overflow-y-auto bg-gray-100 p-4 mb-4 border border-gray-300 rounded-md">
            <p class="text-gray-500 text-center">Loading messages...</p>
        </div>

        <!-- Chat Form -->
        <form id="chat-form" class="space-y-4">
            <div>
                <input type="hidden" id="username" class="border p-2 w-full rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your username" value="<?php echo $_SESSION['user_name']; ?>" >
            </div>
            <div>
                <textarea id="message" class="border p-2 w-full rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Enter your message" required></textarea>
            </div>
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">Send</button>
            </div>
        </form>
    </div>
    </div>

    <script>
        // Fetch messages and update chat box
        function fetchMessages() {
            $.get('getMessages.php', function(data) {
                const messages = JSON.parse(data);
                $('#chat-box').html('');
                messages.reverse().forEach(function(msg) {
                    $('#chat-box').append(
                        `<div class="p-2 bg-blue-50 rounded-md mb-2 shadow-md">
                            <p class="text-sm text-gray-800"><strong class="text-blue-600">${msg.username}:</strong> ${msg.message}</p>
                            <small class="text-gray-400 text-xs">${msg.created_at}</small>
                        </div>`
                    );
                });
                // Automatically scroll down when new messages appear
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            });
        }

        // Send message to server
        $('#chat-form').submit(function(e) {
            e.preventDefault();
            const username = $('#username').val();
            const message = $('#message').val();

            $.post('sendMessage.php', { username: username, message: message }, function() {
                fetchMessages();
                $('#message').val(''); // Clear the message box after sending
            });
        });

        // Fetch messages every 2 seconds to simulate live chat
        setInterval(fetchMessages, 2000);

        // Load messages on page load
        fetchMessages();
    </script>
</body>
</html>
