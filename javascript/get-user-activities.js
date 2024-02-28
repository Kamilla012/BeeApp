document.addEventListener("DOMContentLoaded", function() {
    const xhr = new XMLHttpRequest()
    xhr.open("GET", 'php/get-user-activities.php', true)
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = xhr.response;
            console.log(data)
                let activitiesTable = document.querySelector('.table-with-results');
                activitiesTable.innerHTML = data;

        }
    };
    xhr.open("GET", 'php/get-user-activities.php', true)
    xhr.send();

})
let activitiesTable = document.querySelector('.table-with-results');
console.log(activitiesTable)