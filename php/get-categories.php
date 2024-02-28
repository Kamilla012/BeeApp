<?php
session_start();
include_once "config.php";

$output = array();
$sql = mysqli_query($conn, "SELECT name FROM titles ORDER BY name ASC");

while ($row = mysqli_fetch_assoc($sql)) {
    $output[] = $row['name'];
}

echo json_encode($output);
?>
