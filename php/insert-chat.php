<?php
    session_start();

    if(isset($_SESSION["unique_id"])) {
        include_once "config.php";
        $outgoing_id = $_SESSION["unique_id"];
        $incoming_id = mysqli_real_escape_string($conn, $_POST["incoming_id"]);
        $message = mysqli_real_escape_string($conn, $_POST["message"]);

        $sql= "INSERT INTO messages(incoming_msg_id, outgoing_msg_id, message) VALUE ($incoming_id, $outgoing_id, '$message')";
        $insert_query = mysqli_query($conn, $sql);
        if($insert_query) {
            echo 'Thanh cong';            ;
        }
    } else{
        header("location: ../login.php");
    }
?>