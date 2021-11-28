<?php
    $connection = mysqli_connect("localhost", "root", "", "chatapp");

    if (!$connection) {
        echo "Database not connected: " . mysqli_connect_error();
    }
?>