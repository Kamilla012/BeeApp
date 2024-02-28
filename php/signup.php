<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // Check email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if email already exists in the database
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - This email already exists!";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                // Valid extensions
                $extensions = ['png', 'jpeg', 'jpg'];
                if (in_array($img_ext, $extensions) === true) {
                    $time = time();

                    $new_img_name = $time . $img_name;

                    // Create the directory if it doesn't exist
                    $upload_path = "./images/";
                    if (!is_dir($upload_path)) {
                        mkdir($upload_path, 0755, true);
                    }

                    $upload_path .= $new_img_name;

                    if (move_uploaded_file($tmp_name, $upload_path)) {
                        $status = "Active now";
                        // Insert user data into the database
                        $insert_sql = "INSERT INTO users (fname, lname, email, password, image, status) VALUES ('$fname', '$lname', '$email', '$password', '$new_img_name', '$status')";
                        if (mysqli_query($conn, $insert_sql)) {
                            $sql_session = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
                            if(mysqli_num_rows($sql_session) > 0){
                                $row = mysqli_fetch_assoc($sql_session);


                                //SESSION START
                                $_SESSION['user_id'] = $row["user_id"];
                                echo "success";
                            } else {
                                echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
                            }
                        } else {
                            echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo "File upload failed!";
                    }
                } else {
                    echo "Invalid file extension. Please upload a file with a valid extension (png, jpeg, jpg).";
                }
            }
        }
    } else {
        echo "Invalid email address!";
    }
} else {
    echo "All fields are required!";
}
?>
