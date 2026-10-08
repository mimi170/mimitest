<?php
include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "UPDATE requests SET status='accepted' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: my_requests.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>