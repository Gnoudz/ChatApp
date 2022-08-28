<?php include_once "header.php"; ?>
<?php
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header('location: login.php');
    }
?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <?php
                include_once 'php/config.php';
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, 'SELECT * FROM users WHERE unique_id = '.$user_id.'');
                if(mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <header>
                <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                <div class="content">
                    <img src=<?php echo "php/images/".$row['img']; ?> alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . ' ' . $row['lname']; ?></span>
                        <p><?php echo $row['status'] ; ?></p>
                    </div>
                </div>
            </header>
        </section>
        <div class="chat-box">
                
        </div>

        <div class="typing-form">
            <form action="#" class="typing-area">
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" placeholder="Message..." class='input-field' >
                <button>Send</button>
            </form>
        </div>
    </div>
    <script src="./javascript/chat.js"></script>
</body>

</html>