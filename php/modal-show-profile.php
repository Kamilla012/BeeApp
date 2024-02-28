<?php 
session_start();
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["showUserId"])) {
    $showUserId = $_POST["showUserId"];
    
    $sql = "SELECT users.fname, users.lname, users.image, users_title.title_id, titles.name 
    FROM users 
    JOIN users_title ON users.user_id = users_title.user_id 
    JOIN titles ON titles.id = users_title.title_id WHERE users.user_id = $showUserId ";
  

    $result = mysqli_query($conn, $sql); 
    $output = "";
    if (!$result) {
        
        $output .= "Query error: " . mysqli_error($conn);
    } elseif(mysqli_num_rows($result) == 0){
        $output .= "This user no longer exists";
    } elseif(mysqli_num_rows($result) >= 1){
     
        $user_row = mysqli_fetch_assoc($result);
        $output .= '<div class="modal-content">
        <div class="modal-header">


            <h5 class="modal-title" id="exampleModalLabel">' . $user_row['fname'] . ' ' . $user_row['lname'] . '</h5>
            
            <button type="button" id="closeModalBtn" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           
            <div class="interestsForm">';

while ($row = mysqli_fetch_assoc($result)) {
$output .= '<div class="interest ">' . $row['name'] . '</div>';
}
$output .= '</div>';


$output .= '</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
</div>';
}

} else {

    echo "Error: showUserId not provided";
}

echo $output;
?>
