<?php 
    session_start();
    include_once "config.php";
    $sql = mysqli_query($connection, "SELECT * FROM users");
    $output = "";
    if (mysqli_num_rows($sql) == 1) {
        $output .= "No users are available to chat"; 
    } elseif(mysqli_num_rows($sql) > 0) {
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="#">
                            <div class="content">
                                <img src="php/images/' . $row['image'].'" alt="">
                                <div class="details">
                                    <span>'. $row['first_name'] . " ". $row['last_name'].'</span>
                                    <p>this is a message</p>
                                </div>
                            </div>
                            <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>';
        }
    }
    echo $output;
?>