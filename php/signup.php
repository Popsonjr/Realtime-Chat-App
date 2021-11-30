<?php
session_start();
include_once "config.php";
$firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if (!empty($firstName) && !empty($lastName) && !empty($password) && !empty($email)) {
    # validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // check if email already exists in database
        $sql = mysqli_query($connection, "SELECT EMAIL FROM users WHERE email ='{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - This email already exists";
        } else {
            // check if user uploaded image file
            if (isset($_FILES['image'])) {
                $imageName = $_FILES['image']['name'];
                $imageType = $_FILES['image']['type'];
                $tmpName = $_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder
                // get image extension
                $imageExplode = explode('.', $imageName);
                $imageExtension = end($imageExplode);
                $extensions = ['png', 'jpg', 'jpeg'];

                if (in_array($imageExtension, $extensions) === true) {
                    $time = time(); //give current time to rename the image when uploading to have a unique name
                    $newImageName = $time.$imageName;
                    if(move_uploaded_file($tmpName, "images/".$newImageName)){
                        $status = "Active now"; //once user signed up, his status will be active now
                        $randomId = rand(time(), 10000000); // creating random id

                        //insert all user data in database
                        $sql2 = mysqli_query($connection, "INSERT INTO users (unique_id, first_name, last_name, email, password, image, status) VALUES ({$randomId},'{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$newImageName}', '{$status}' )");

                        if ($sql2) {
                            $sql3 = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                            
                        } else {
                            echo "Something went wrong";
                        }
                        
                    }
                } else {
                    echo "Please select an image file - jpeg, jpg, png!";
                }
                
            } else {
                echo "Please upload an image";
            }
        }
    } else {
        echo "$email - This is not a valid email";
    }
}else {
    echo "All input fields are required";
}
?>