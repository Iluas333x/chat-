<?php
include('config.php');

// INSERT MESSAGE
if (isset($_POST['botona'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($message)) {
        mysqli_query($conn, "INSERT INTO chat (name, msg) VALUES ('$name', '$message')");
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Simple Chat</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #0f172a;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.chat-container {
    width: 380px;
    height: 600px;
    background: #111827;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.chat-header {
    background: #1f2937;
    padding: 15px;
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 18px;
}

.chat-body {
    flex: 1;
    padding: 15px;
    overflow-y: auto;
}

.message {
    background: #2563eb;
    color: white;
    padding: 10px 14px;
    border-radius: 12px;
    margin: 8px 0;
    max-width: 80%;
}

.chat-footer {
    background: #1f2937;
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

input, button {
    padding: 10px;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 14px;
}

input {
    background: #111827;
    color: white;
    border: 1px solid #374151;
}

input::placeholder {
    color: #9ca3af;
}

button {
    background: #2563eb;
    color: white;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    opacity: 0.9;
}
</style>
</head>
<body>

<div class="chat-container">

    <div class="chat-header">
        💬 Simple Chat
    </div>

    <div class="chat-body">
        <?php
        $query = "SELECT * FROM chat ORDER BY id ASC";
        $run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($run)) {
            echo '<div class="message">';
            echo htmlspecialchars($row['name']) ;
            echo '<br>';
            echo htmlspecialchars($row['msg']);
            echo '</div>';
        }
        ?>
    </div>

    <div class="chat-footer">
        <form method="post">
            <input type="text" name="name" placeholder="Your name" required>
            <input type="text" name="message" placeholder="Type your message..." required>
            <button name="botona">Send</button>
        </form>
    </div>

</div>

<script>
    // Auto scroll to bottom
    const chatBody = document.querySelector('.chat-body');
    chatBody.scrollTop = chatBody.scrollHeight;
</script>

</body>
</html>
