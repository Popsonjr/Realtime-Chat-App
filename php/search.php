<?php
    session_start();
    include_once "config.php";
    $outgoingId = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE NOT unique_id = {$outgoingId} AND (first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%')");
    if (mysqli_num_rows($sql) > 0) {
        include "data.php"; 
    } else {
        $output .= "No user found related to your search term";
    }
    
    echo $output;
    
?>