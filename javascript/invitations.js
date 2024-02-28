//tab changing function
function showTab(tabId) {

    var tabs = document.getElementsByClassName('tab-content');
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove('active');
    }


    document.getElementById(tabId).classList.add('active');
  }


//Ajax for displaying data about available users
function addToFriends(userId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log(xhr.responseText); 
                addToFriendsList(userId)
             
            
               
            } else {
                console.error("Request failed with status: " + xhr.status);
            }
        }
    };

    xhr.open("POST", "php/friends-invitations.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var data = "userId=" + encodeURIComponent(userId);
 
    xhr.send(data);
    
}











function addToFriendsList(userId) {
    // Get the button element that was clicked
    var button = document.getElementById('btn-friend-' + userId);
    // Get the parent li element
    var listItem = button.closest('.list-group-item');
    // Check if the parent li exists
    if (listItem) {
        // Remove the parent li
        listItem.remove();
    }
}



//function to show the modal

// function showProfile(userId){
//     const profileModal = document.getElementById("profileModal");
//     let btn = document.getElementById("btn-show-" + userId);
//     profileModal.classList.add("show");
//     profileModal.style.display = "block"
// }

// //funtion to close modal 
// function closeModalFuntion(){
//     const closeModal = document.getElementById("closeModalBtn")
//     closeModal.classList.remove("show")
//     closeModal.style.display = "none"
// }


