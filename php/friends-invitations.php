<?php
session_start();
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];

     
        $sql = "INSERT INTO friends_inv (u_send, u_receive, status) VALUES (" . $_SESSION['user_id'] . ", $userId, 'sent')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Friend request sent successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: userId parameter not set";
    }



    
} else {
    echo "Error: Invalid request method";
}

// Close the database connection
$conn->close();
?>
