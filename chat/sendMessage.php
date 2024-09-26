<?php
$host = 'localhost';
$dbname = 'ezpc';
$username = 'root'; 
$password = ''; 

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


session_start();



if (isset($_POST['username']) && isset($_POST['message'])) {
    $user = $_POST['username'];
    // $user = $_SESSION['username'];  
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (username, message) VALUES (:username, :message)");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        echo 'Message sent successfully';
    } else {
        echo 'Error';
    }
}
?>
