<?php 
session_start();
if(isset($_SESSION['user_id'])){
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $output = "";

    $sql = "SELECT * FROM messages
            WHERE (outgoing_msg_id = ? AND incoming_msg_id = ?)
            OR (outgoing_msg_id = ? AND incoming_msg_id = ?)
            ORDER BY msg_id ASC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iiii', $outgoing_id, $incoming_id, $incoming_id, $outgoing_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['outgoing_msg_id'] == $outgoing_id){
                $output .= '<div class="message outgoing">
                                <p>'.$row['msg'].'</p>
                            </div>';
            } else {
                $output .= '<div class="message incoming">
                                <p>'.$row['msg'].'</p>
                            </div>';
            }
        }
    } else {
        $output = "No messages yet";
    }

    echo $output;
}
?>
