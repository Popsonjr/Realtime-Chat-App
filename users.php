<?php 
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
include_once "header.php"; 

?>
<body>
    <div class="wrapper">
        <section class="users">
            
            <header>

            <?php
            include_once "php/config.php";
            $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
                <div class="content">
                    <img src="php/images/<?=$row['image'] ?>" alt="">
                    <div class="details">
                        <span><?= $row['first_name'] ." " . $row['last_name'] ?></span>
                        <p><?= $row['status'] ?></p>
                    </div> 
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select a user to chat with</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i>
                </button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>
    <script src="js/users.js"></script>
</body>
</html>