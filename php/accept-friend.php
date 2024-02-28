<?php
session_start();
include_once "config.php";

$idLogginUser = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];

        // starting a transaction
        mysqli_begin_transaction($conn);

        //INSERT TO FRIENDS TABLE 
        $sqlAccept = "INSERT INTO friends (u_send, u_receive) VALUES ($userId, $idLogginUser)";
        $resultInsert = mysqli_query($conn, $sqlAccept); 

        //DELETE FROM FRIENDS_INV TABLE
        $sqlDelete = "DELETE FROM friends_inv WHERE u_send = $userId AND u_receive = $idLogginUser";
        $resultDelete = mysqli_query($conn, $sqlDelete);

        if($resultInsert && $resultDelete){
            mysqli_commit($conn);
            echo "Friend request accepted successfully";
        } else {
            mysqli_rollback($conn);
            echo "Error: " . $sqlAccept . "<br>" . mysqli_error($conn); 
        }
    } else {
        //Error handling when userId parameter is not set
        echo "Error: userId parameter not set";
    }
} else {
    echo "Error: Invalid request method";
}
?>
