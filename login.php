<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chatyyy!</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="form login">
                <header>Chatyyy!</header>
                <form action="#">
                    <div class="error-txt">Error message</div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter your email address" name="email">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter new password" name="password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to chat">
                    </div>
                    <div class="link">Don't have an account? <a href="index.php">Signup now</a></div>
                </form>
                
            </section>
        </div>
        <script src="js/pass-show-hide.js"></script>
        <script src="js/login.js"></script>
    </body>
</html>