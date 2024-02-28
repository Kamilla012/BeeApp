function searchBar() {
    let inputElements = document.querySelectorAll('.search-bar-inputs');
    let btnSearches = document.querySelectorAll('.btn-search');
    let lists = document.querySelectorAll(".list-group");

    inputElements.forEach((inputElement, index) => {
        inputElement.addEventListener('keyup', function(){
            let inputValue = inputElement.value.trim().toLowerCase();
            let userList = lists[index];
            let listItems = userList.querySelectorAll('li');

            btnSearches.forEach(btnSearch =>{
                if(inputValue == ""){
                    btnSearch.innerHTML = `<i class="fa-solid fa-magnifying-glass"></i>`;
                } else {
                    btnSearch.innerHTML = `<i class="fa-solid fa-xmark"></i>`;
                }
            });

            listItems.forEach(listItem => {
                let itemText = listItem.textContent.trim().toLowerCase();
                if (itemText.includes(inputValue)) {
                    listItem.style.display = "block";
                } else {
                    listItem.style.display = "none";
                }
            });
        });
    });
}

// Wywołanie funkcji
document.addEventListener('DOMContentLoaded', function() {
    searchBar();
});

