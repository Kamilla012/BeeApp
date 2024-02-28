
<?php
// Rozpocznij sesję
session_start();
include 'config.php';
// Pobierz dane przesłane z JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Sprawdź, czy użytkownik jest zalogowany
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    if ($data && isset($data['selectedTitles'])) {
        // Przetwarzaj dane i zapisz do bazy danych
        $selectedTitles = $data['selectedTitles'];

        // Dołącz plik z połączeniem do bazy danych
         // Zmień nazwę pliku na rzeczywistą nazwę
        
        // Iteracja przez wybrane tytuły i zapis do bazy danych
        foreach ($selectedTitles as $selectedTitle) {
            $userIdInt = intval($userId);
           
            
            // Wstawienie danych do tabeli users_title
            $query = "INSERT INTO users_title (user_id, title_id) 
            VALUES (
                '$userId',
                (SELECT id FROM titles WHERE name = '$selectedTitle')
            )";
            
            // Wykonaj zapytanie
            if (mysqli_query($conn, $query) === FALSE) {
                echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
                mysqli_close($conn);
                exit;
            }
        }

        // Zamykamy połączenie z bazą danych
        mysqli_close($conn);

        // Zwróć odpowiedź do JavaScript
        echo json_encode(['success' => true]);
    } else {
        // Jeśli dane nie zostały poprawnie przesłane
        echo json_encode(['success' => false, 'error' => 'Invalid data']);
    }
} else {
    // Jeżeli użytkownik nie jest zalogowany
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
}
?>
