<?php


    session_start();
    include_once "config.php";

    $id_user =  $_SESSION['user_id'];

    //select only those users who have been accepted as friends (for the user who has accepted the invitation)
    $sql = mysqli_query($conn, "SELECT * FROM users INNER JOIN friends ON (users.user_id = friends.u_receive OR users.user_id = friends.u_send) AND users.user_id != $id_user WHERE u_receive = $id_user OR u_send = $id_user");


    $output = "";
    if(mysqli_num_rows($sql) == 0){
        $output .= "No users are available to chat";
    } elseif(mysqli_num_rows($sql) >= 1) {


        //friends list
        while($row = mysqli_fetch_assoc($sql)){
            
            $output .= '
            <li class="list-group-item">
                <div class="list-group-items">
                    <div class="user-content-detail">
                 
                        <img src="php/images/' . $row['image'] . '" class="profile-img" alt="profile"/>
                        <h3 class="user-details">' . $row['fname'] . " " . $row['lname'] . '</h3>
                 
                 
                    </div>
                    
                    <div>
                       
                        <button class="btn-controler">Text</button>
                    </div>
                </div>
            </li>';
        
        }
        
    
    }
    echo $output;
?>
