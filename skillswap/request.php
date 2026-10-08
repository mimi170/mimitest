<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sender_id = $_SESSION['user_id'];
    $receiver_id = $_POST['receiver_id'];
    $skill_id = $_POST['skill_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO requests
            (sender_id, receiver_id, skill_id, message)
            VALUES
            ('$sender_id', '$receiver_id', '$skill_id', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Request Sent Successfully!</h2>";
        echo "<a href='skills.php'>Back to Skills</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>