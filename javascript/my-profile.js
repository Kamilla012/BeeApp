document.addEventListener('DOMContentLoaded', function () {
    const triggerTabList = document.querySelectorAll('#myTab button');
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl);

        triggerEl.addEventListener('click', event => {
            event.preventDefault();
            tabTrigger.show();
        });
    });

    // AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/my-profile.php', true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            const data = JSON.parse(xhr.responseText);

            // Sprawdź, czy nie ma błędów
            if (!data.error) {
                const userNameElement = document.getElementById('user-name');
                const profileImageElement = document.getElementById('profile-image');
                const fnameInput = document.getElementById('fname-input');
                const lnameInput = document.getElementById('lname-input');
                const emailInput = document.getElementById('email-input')

                userNameElement.textContent = data.fname;
                const imagePath = './php/images/' + data.image; 
                profileImageElement.src = imagePath;

                fnameInput.placeholder = data.fname;
                lnameInput.placeholder = data.lname;
                emailInput.placeholder = data.email;
            } else {
                console.error(data.error);
            }
        }
    };

    xhr.send();
});
