<?php
//users possible to add

    session_start();
    include_once "config.php";

    $id_user =  $_SESSION['user_id'];

    $sql = mysqli_query($conn, "SELECT users.user_id, friends_inv.u_send, friends_inv.u_receive, users.fname, users.lname, users.image FROM friends_inv JOIN users ON friends_inv.u_send = users.user_id WHERE friends_inv.status = 'sent' and u_receive = $id_user");
    $output = "";
    if(mysqli_num_rows($sql) == 0){
        $output .= "There are no bees requests";
    } elseif(mysqli_num_rows($sql) >= 1) {


        while($row = mysqli_fetch_assoc($sql)){
            
            $output .= '
            <li class="list-group-item">
                <div class="list-group-items">
                    <div class="user-content-detail">
                 
                        <img src="php/images/' . $row['image'] . '" class="profile-img" alt="profile"/>
                        <h3 class="user-details">' . $row['fname'] . " " . $row['lname'] . '</h3>
                 
                 
                    </div>
                    
                    <div>
                    <button id="btn-accept-' . $row['user_id'] . '" class="btn-controler" data-user-id="' . $row['user_id'] . '" onclick="acceptToFriends(' . $row['user_id'] . ');">Accept</button>
                    <button id="btn-reject-' . $row['user_id'] . '" class="btn-controler" data-user-id="' . $row['user_id'] . '" onclick="rejectFriend(' . $row['user_id'] . ');">Reject</button>
                    </div>
                </div>
            </li>';
        
        }
        
    
    }
    echo $output;
?>
