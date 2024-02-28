(function() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("list-group-friends").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "php/user-friends.php", true);
    xhr.send();
})();
