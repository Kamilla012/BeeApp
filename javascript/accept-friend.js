function acceptToFriends(userId) {
    console.log(userId);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/accept-friend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send("userId=" + userId);
}

function rejectFriend(userId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/reject-friend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
         
            console.log(xhr.responseText);
        }
    };
    xhr.send("action=rejectFriend&userId=" + userId);
}