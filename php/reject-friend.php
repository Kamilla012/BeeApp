<?php
session_start();
include_once "config.php";


$idLogginUser = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];

   

   
        $sqlReject = "DELETE FROM friends_inv WHERE u_send = $userId AND u_receive = $idLogginUser";
        $resultRejct = mysqli_query($conn, $sqlReject); 

     

        if($resultRejct){
          
            echo "Friend request rejected successfully";
        } else {
         
            echo "Error: " . $sqlReject . "<br>" . mysqli_error($conn); 
        }
    } else {
        //Error handling when userId parameter is not set
        echo "Error: userId parameter not set";
    }
} else {
    echo "Error: Invalid request method";
}

?>