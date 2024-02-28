//displaying users who have sent a friend request
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/invitation-list.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                let userInvitations = document.getElementById("invitations-list");
                userInvitations.innerHTML = data;
            }
        }
    };

    xhr.send();
}, 3600);
