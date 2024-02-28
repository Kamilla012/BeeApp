<?php 
session_start();
if(isset($_SESSION['user_id'])) {
    include_once "config.php";
    $user_id = $_SESSION['user_id']; 

    // Odczytaj dane z żądania POST
    $data = json_decode(file_get_contents("php://input"));
    $reachedTime = $data->timeReached;
    $selectedActivity = $data->selectedActivity;

    $sql = "INSERT INTO users_activities (user_id, activity, duration) VALUES ($user_id, '$selectedActivity', '$reachedTime')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "The operation was completed successfully"; 
    } else {
        echo "An error occurred during the operation"; 
    }
} else {
    echo "User not logged in"; 
}
?>
