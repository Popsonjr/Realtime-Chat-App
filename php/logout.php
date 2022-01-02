<?php
    session_start();
    if (isset($_SESSION['unique_id'])) { // means user is logged in
        include_once "config.php";
        $logoutId = mysqli_real_escape_string($connection, $_GET['logout_id']);
        if (isset($logoutId)) {
            $status = "Offline now";
            $sql = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logoutId}");
            if ($sql) {
                session_unset();
                session_destroy();
                header("location: ../login.php");

            } else {
                header("location: ../users.php");
            }
        }
    } else {
        header("location: ../login.php");
    }

?>