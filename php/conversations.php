<?php

function getConversation($user_id, $conn) {

    $sql = "SELECT * FROM conversations
            WHERE user_1=? OR user_2=?
            ORDER BY conversation_id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $conversations = $result->fetch_all(MYSQLI_ASSOC);

    
        $user_data = [];

        foreach($conversations as $conversation){

            if ($conversation['user_1'] == $user_id) {
                $sql2  = "SELECT *
                          FROM users WHERE user_id=?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("i", $conversation['user_2']);
                $stmt2->execute();
            }else {
                $sql2  = "SELECT *
                          FROM users WHERE user_id=?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("i", $conversation['user_1']);
                $stmt2->execute();
            }

            $allConversations = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

            array_push($user_data, $allConversations[0]);
        }

        return $user_data;

    } else {
        $conversations = [];
        return $conversations;
    }  

}
