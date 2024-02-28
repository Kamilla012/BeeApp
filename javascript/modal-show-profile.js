
const profileModal = document.getElementById("profileModal");

function showUserProfile(showUserId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
             
                showProfile()
                const modal = document.getElementById("modal-body-show-user");
                modal.innerHTML = xhr.responseText; 
                
               
            } else {
                console.error("Request failed with status: " + xhr.status);
            }
        }
    };

    xhr.open("POST", "php/modal-show-profile.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var data = "showUserId=" + encodeURIComponent(showUserId);
 
    xhr.send(data);
    
}

//function to show the modal

function showProfile(){

 
    profileModal.classList.add("show");
    profileModal.style.display = "block"

    
}

//funtion to close modal 
function closeModalFuntion(){

    profileModal.classList.remove("show")
    profileModal.style.display = "none"
}
