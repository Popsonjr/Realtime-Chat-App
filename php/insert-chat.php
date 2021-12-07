<?php
session_start();
if ((isset($_SESSION['unique_id']))) {
    include_once "config.php";
    $outgoingId = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    $incomingId = mysqli_real_escape_string($connection, $_POST['incoming_id']);
    echo $message;
    if (!empty($message)) {
        $sql = mysqli_query($connection, "INSERT INTO messages (incoming_message_id, outgoing_message_id, message) VALUES ({$incomingId}, {$outgoingId}, '{$message}')") or die();
    }
} else {
    header("../login.php");
}
?>