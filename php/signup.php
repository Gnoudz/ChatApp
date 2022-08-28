<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $select_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($select_sql) > 0) {
                echo "$email - The email already exists!";
            } else {
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_exploded = explode('.', $img_name);
                    $img_ext = end($img_exploded);

                    $extensions = ["png", "jpg", "jpeg"];

                    if (in_array($img_ext, $extensions)) {
                        $types = ["image/png", "image/jpeg", "image/jpg"];
                        if (in_array($img_type, $types)) {
                            $time = time();
                            $new_img_name = $time . $img_name;
                            if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                                $ran_id = rand(time(), 1000000000);
                                $pswrd = md5($password);
                                $status = "Active";
                                $insert_sql = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                                                    VALUES ({$ran_id}, '{$fname}', '{$lname}', '{$email}', '{$pswrd}', '{$new_img_name}', '{$status}')");
                                if ($insert_sql) {
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                                    if (mysqli_num_rows($select_sql2) > 0) {
                                        $result = mysqli_fetch_array($select_sql2);
                                        $_SESSION["unique_id"] = $result["unique_id"];
                                        echo "success";
                                    } else {
                                        echo "Email not exists!";
                                    }
                                } else {
                                    echo "Can't insert data to database";
                                }
                            } else {
                                echo "Something went wrong! Please try again";
                            }
                        }
                    } else {
                        echo "Please select image - png, jpg, jpeg";
                    }
                } else {
                    echo "Please select image - png, jpg, jpeg";
                }
            }
        } else {
            echo "$email - The email not valid!";
        }
    } else {
        echo "All input fields are required!";
    }
    ?>