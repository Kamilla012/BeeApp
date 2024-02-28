<?php
session_start();
include_once "config.php";

$output = array();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql_check = "SELECT user_id, fname, lname, email, image FROM users WHERE user_id = '$userId'";
    $result_check = mysqli_query($conn, $sql_check);

    if ($result_check && mysqli_num_rows($result_check) > 0) {
        $row = mysqli_fetch_assoc($result_check);

        // Pobierz dane użytkownika
        $output['fname'] = $row['fname'];
        $output['lname'] = $row['lname'];
        $output['email'] = $row['email'];
        $output['image'] = $row['image'];
    } else {
        // Błąd: Użytkownik nie istnieje w bazie danych
        $output['error'] = "Użytkownik nie istnieje";
    }
} else {
    // Błąd: Sesja użytkownika nie istnieje
    $output['error'] = "Sesja użytkownika nie istnieje";
}

header('Content-Type: application/json');
echo json_encode($output);
?>
