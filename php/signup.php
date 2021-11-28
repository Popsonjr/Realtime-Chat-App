<?php
include_once "config.php";
echo "addss";
$firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
echo $firstName;
$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if (!empty($firstName) && !empty($lastName) && !empty($password) && !empty($email)) {
    # validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
    } else {
        echo "$email - This is not a valid email";
    }
}else {
    echo "All input fields are required";
}
?>