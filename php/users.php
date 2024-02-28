<?php
//users possible to add

    session_start();
    include_once "config.php";

    $id_user =  $_SESSION['user_id'];

// select data from the friends_inv and users table, select only those records that are not yet in the friends_inv table 
//(do not display the user who is currently logged in) additionally, 
//if the user is already in the friends table, do not display him)

$sql = mysqli_query($conn, "SELECT users.fname, users.lname, users.user_id, users.image, friends_inv.u_send, friends_inv.u_receive FROM users
LEFT JOIN friends_inv ON users.user_id = friends_inv.u_receive 
AND friends_inv.u_send = $id_user WHERE friends_inv.u_receive IS NULL
AND users.user_id != $id_user 
AND users.user_id NOT IN (SELECT u_send FROM friends WHERE u_receive = $id_user 
                          UNION 
                          SELECT u_receive FROM friends WHERE u_send = $id_user);");
 
    $output = "";
    if(mysqli_num_rows($sql) == 0){
        $output .= "No users are available to chat";
    } elseif(mysqli_num_rows($sql) >= 1) {


        while($row = mysqli_fetch_assoc($sql)){
            // profiles of people who can be added 
            $output .= '
            <li class="list-group-item">
                <div class="list-group-items">
                    <div class="user-content-detail">
                 
                        <img src="php/images/' . $row['image'] . '" class="profile-img" alt="profile"/>
                        <h3 class="user-details">' . $row['fname'] . " " . $row['lname'] . '</h3>
                 
                 
                    </div>
                    
                    <div>
                        <button id="btn-friend-' . $row['user_id'] . '" class="btn-controler" data-user-id="' . $row['user_id'] . 
                        '" onclick="addToFriends(' . $row['user_id'] . ');">Add to friends</button>
                        <button class="btn-controler" id="btn-show-user-' . $row['user_id'] .'" onclick="showUserProfile(' . $row['user_id'] . ')">Show profile</button>

                        
                        
                      
                    </div>
                </div>
            </li>';
        
        }
        
    
    }
    echo $output;
?>
