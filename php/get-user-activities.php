<?php 
session_start();
include_once "config.php";

$id_user =  $_SESSION['user_id'];

$sql = "SELECT user_id, activity, date, duration FROM users_activities WHERE user_id = $id_user ORDER BY date DESC ";
$result = mysqli_query($conn, $sql);

$output = "";
if(mysqli_num_rows($result) == 0){
    $output .= "No users are available to chat";
} elseif(mysqli_num_rows($result) >= 1) {
    $output .= '<tr class="table-with-results-titles">
    <th class="table-with-results-th">Name of activity</th>
    <th class="table-with-results-th">Time of activity</th>
    <th class="table-with-results-th">Day of activity</th>
  </tr>';
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<tr class="table-with-results-tr">
        <td class="table-with-results-th">' . $row['activity'] . '</td>
        <td class="table-with-results-th">' . $row['duration'] . '</td>
        <td class="table-with-results-th">' . $row['date'] . '</td>
      </tr>';
    }
}
echo $output;
?>
