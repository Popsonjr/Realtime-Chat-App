<?php
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($connection, "SELECT users WHERE first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%'");
    if (mysqli_num_rows($sql) > 0) {
        $output .= "user is found";
    } else {
        $output .= "No user found related to your search term";
    }
    echo $output;
    
?>