<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $select_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($select_sql) > 0) {
            $enc_pass = md5($password);
            $result = mysqli_fetch_assoc($select_sql);
    
            $user_pass = $result["password"];
            if($enc_pass === $user_pass) {
                $_SESSION["unique_id"] = $result["unique_id"];
                echo 'success';
            } else {
                echo "Password is not correct";
            }
        } else {
            echo "$email - This email is not exist";
        }
    } else{
        echo "$email - This email is not valid";
    }
} else {
    echo "All field input are required";
}
