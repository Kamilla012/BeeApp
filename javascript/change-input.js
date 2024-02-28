function toggleEdit(input, editButton) {
    if (input.disabled) {
        input.removeAttribute('disabled');
        editButton.innerHTML = '<i class="fa-solid fa-check"></i>';
    } else {
        input.setAttribute('disabled', 'disabled');
        editButton.innerHTML = '<i class="fa-solid fa-pencil"></i>';
        updateData(input.id, input.value);
    }
}

function updateData(fieldName, newValue) {
    // Wyślij żądanie AJAX do serwera PHP
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send('field_name=' + fieldName + '&new_value=' + encodeURIComponent(newValue));
}

// Pobierz przyciski edycji i pola tekstowe
var fnameEditButton = document.getElementById('fname-edit-button');
var fnameInput = document.getElementById('fname-input');

// Dodaj obsługę zdarzenia kliknięcia dla przycisku edycji
fnameEditButton.addEventListener('click', function () {
    toggleEdit(fnameInput, fnameEditButton);
});