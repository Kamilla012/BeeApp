<?php
include('config.php');
function getUser($user_id, $conn){
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $user = $result->fetch_assoc();
        return $user;
    } else {
        $user = [];  
        return $user;  
    }
}
?>
