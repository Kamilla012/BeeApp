
document.addEventListener("DOMContentLoaded", function() {
   
    fetchUsers();

    function fetchUsers() {
        var xhr = new XMLHttpRequest();

        xhr.open("GET", "php/users.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var responseText = xhr.responseText;

                    // Sprawdź, czy odpowiedź zawiera poprawny JSON
                    if (isValidJson(responseText)) {
                        var response = JSON.parse(responseText);

                        if (response.error) {
                            // Jeśli wystąpił błąd, wyświetl komunikat
                            document.getElementById("userList").innerHTML = '<p>' + response.error + '</p>';
                        } else {
                            // Jeśli dane zostały pomyślnie pobrane, wypełnij listę
                            var userList = document.getElementById("userList");
                            userList.innerHTML = '';

                            response.users.forEach(function(user) {
                                var listItem = '<li class="list-group-item">';
                                listItem += '<a href="chat.php" class="user-content">';
                                listItem += '<div class="user-content-detail">';
                                listItem += '<img src="./php/images/' + user.profile_image + '" class="profile-img" alt="your profile"/>';
                                listItem += '<h3 class="user-details">' + user.username + '</h3>';
                                listItem += '</div>';
                                listItem += '<button>Add to friends</button>';
                                listItem += '<button>Show Profile</button>';
                                listItem += '</a>';
                                listItem += '</li>';

                                userList.insertAdjacentHTML('beforeend', listItem);
                            });
                        }
                    } else {
                        // Jeśli odpowiedź nie jest JSON-em, wyświetl treść odpowiedzi w konsoli
                        console.error("Invalid JSON received. Response content:", responseText);

                        document.getElementById("userList").innerHTML = '<p>Error: Invalid JSON received</p>';
                    }
                } else {
                    // Jeśli wystąpił błąd w trakcie pobierania danych
                    document.getElementById("userList").innerHTML = '<p>Error fetching users</p>';
                }
            }
        };

        xhr.send();
    }

    function isValidJson(text) {
        try {
            JSON.parse(text);
            return true;
        } catch (error) {
            return false;
        }
    }
});