<?php
      while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_message_id = {$row['unique_id']} OR outgoing_message_id = {$row['unique_id']}) AND (outgoing_message_id = {$outgoingId} OR incoming_message_id = {$outgoingId}) ORDER BY message_id DESC LIMIT 1";
        $query2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['message'];
        } else {
            $result = "No message available";
        }
        // trimming message if words are more than 28
        (strlen($result) > 26) ? $message = substr($result, 0, 26). " . . ." : $message = $result;
        ($outgoingId == $row2['outgoing_message_id']) ? $you = "You: " : $you = "";

        //check if user is online
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'].'">
                        <div class="content">
                            <img src="php/images/' . $row['image'].'" alt="">
                            <div class="details">
                                <span>'. $row['first_name'] . " ". $row['last_name'].'</span>
                                <p>'. $you . $message .'</p>
                            </div>
                        </div>
                        <div class="status-dot ' .$offline. '"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>