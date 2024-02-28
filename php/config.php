<?php 
    $conn = mysqli_connect("localhost" , "root", "", "gym_app");
    if(!$conn){
        echo "Database connected" . mysqli_connect_error();
    }
?>