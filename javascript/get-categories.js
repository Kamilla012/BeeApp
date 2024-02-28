document.addEventListener('DOMContentLoaded', function () {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/get-categories.php', true); 
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function () {
        if (xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            const titlesContainer = document.querySelector('.titles-container');
            
            titlesContainer.innerHTML = '';

            data.forEach(function (element) {
                let titleElement = document.createElement('div');
                
                titleElement.textContent = element;
                titleElement.classList.add('titleInterest');

                titleElement.addEventListener('click', function () {
                    const isSelected = titleElement.classList.contains('selected');

                    if (isSelected) {
                        titleElement.classList.remove('selected');
                    } else {
                        titleElement.classList.add('selected');
                    }

                    const selectedElements = document.querySelectorAll('.titles-container .selected');
                    const selectedTitles = Array.from(selectedElements).map(el => el.textContent);

                    // console.log('Wybrane kategorie:', selectedTitles);
                });

                titlesContainer.appendChild(titleElement);
            });

            // Dodaj obsługę kliknięcia przycisku do zapisu danych
            const saveButton = document.querySelector('.saveButton');
            saveButton.addEventListener('click', function () {
                const selectedElements = document.querySelectorAll('.titles-container .selected');
                const selectedTitles = Array.from(selectedElements).map(el => el.textContent);

                // console.log('Wybrane kategorie:', selectedTitles);

                // Wywołaj funkcję do zapisu wyborów
                saveSelectedTitles(selectedTitles);
            });

        } else {
            console.error('Error AJAX:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Błąd AJAX');
    };

    xhr.send();

    function saveSelectedTitles(selectedTitles) {
        const data = JSON.stringify({ selectedTitles });

        let saveXhr = new XMLHttpRequest();
        saveXhr.open('POST', 'php/save-selections.php', true);
        saveXhr.setRequestHeader('Content-Type', 'application/json');

        saveXhr.onload = function () {
            if (saveXhr.status === 200) {
                location.href = "./home.php";
                console.log('Zapisano wybory użytkownika w bazie danych!!!');
            } else {
                console.error('Error AJAX:', saveXhr.statusText);
            }
        };

        saveXhr.onerror = function () {
            console.error('Błąd AJAX');
        };

        saveXhr.send(data);
    }
});
