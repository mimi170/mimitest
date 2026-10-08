<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM skills 
            WHERE id='$id' AND user_id='$user_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: my_skills.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>