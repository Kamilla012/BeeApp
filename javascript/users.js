// const searchBar = document.querySelector(".users .search input"),
//       searchBtn = document.querySelector(".users .search button"),
//       usersList = document.querySelector(".users .users-list");
      

//displaying users that can be added


    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                let userList = document.getElementById("userList");
                userList.innerHTML = data;
                
            }
        }
    };
    
    xhr.send();


    