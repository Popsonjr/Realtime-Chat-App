<?php
session_start();
if ((isset($_SESSION['unique_id']))) {
    include_once "config.php";
    
    $outgoingId = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
    
    $incomingId = mysqli_real_escape_string($connection, $_POST['incoming_id']);
    
    $output = "";

    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_message_id 
    WHERE (outgoing_message_id = {$outgoingId} AND incoming_message_id = {$incomingId}) OR (outgoing_message_id = {$incomingId} AND incoming_message_id = {$outgoingId}) ORDER BY message_id ASC";
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) { 
            if ($row['outgoing_message_id'] === $outgoingId) {
             
                $output .= ' <div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['message'] .'</p>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/'. $row['image'] .'" alt="">
                                <div class="details">
                                    <p>'. $row['message'] .'</p>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
} else {
    header("../login.php");
}
?>