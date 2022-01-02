<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
include_once "header.php";

?>
    <body>
        <div class="wrapper">
            <section class="form signup">
                <header>Chatyyy!</header>
                <form action="#" enctype="multipart/form-data">
                    <div class="error-txt">Error message</div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" placeholder="First Name" name="firstName" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" placeholder="Last Name" name="lastName" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter your email address" name="email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter new password" name="password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image </label>
                        <input type="file" name="image">
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to chat">
                    </div>
                    <div class="link">Already signed Up? <a href="login.php">Login now</a></div>
                </form>
                
            </section>
        </div>
        <script src="js/signup.js"></script>
        <script src="js/pass-show-hide.js"></script>

    </body>
</html>