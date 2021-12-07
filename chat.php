<?php
    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
    include_once "header.php";
    include_once "php/config.php";
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
?>
    <body>
        <div class="wrapper">
            <section class="chat-area">
                <header>    
                    <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="<?php echo 'php/images/' . $row['image'] ?>" alt="">
                    <div class="details">
                        <span><?= $row['first_name'] . " ". $row['last_name'] ?></span>
                        <p><?= $row['status'] ?></p>
                    </div> 
                
                </header>
                <div class="chat-box">
                    <div class="chat outgoing">
                        <div class="details">
                            <p>wwwwwwwwwwwwwwwwwwwww</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="img.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>wwwwwwwwwwwwwwwwwwwww</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="img.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>wwwwwwwwwwwwwwwwwwwww</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="img.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>wwwwwwwwwwwwwwwwwwwww</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="img.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <form action="#" class="typing-area" autocomplete="off">
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
                    <input type="text" name="message"  class="input-field" placeholder="Type a message here...">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
    <script src="js/chat.js"></script>
    </body>
</html>