<?php 
    session_start();
    include_once "config.php";

    $output = array();

    $sql = mysqli_query($conn, "SELECT * FROM users");
    
    if(mysqli_num_rows($sql) == 0){
        $output['error'] = "No users are available to chat";
    } else {
        $output['users'] = array();

        while($row = mysqli_fetch_assoc($sql)) {
            $output['users'][] = array(
                'id' => $row['id'],
                'username' => $row['username'],
                'profile_image' => $row['profile_image']
            );
        }
    }

    header('Content-Type: application/json');
    echo json_encode($output);
?>
