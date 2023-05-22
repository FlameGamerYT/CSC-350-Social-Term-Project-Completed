<?php
session_start();
include_once "config.php";

if (isset($_SESSION['unique_id']) && isset($_POST['blocked_id'])) {
    $blocker_id = $_SESSION['unique_id'];
    $blocked_id = mysqli_real_escape_string($conn, $_POST['blocked_id']);
    $sql = "DELETE FROM blocked_users WHERE blocker_id = '$blocker_id' AND blocked_id = '$blocked_id'";
    $query = mysqli_query($conn, $sql);

    if($query){
        echo "User has been blocked successfully.";
    }else{
        echo "Failed to block user.";
    }
}else{
    echo "Invalid request.";
}
?>