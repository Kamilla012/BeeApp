//function to show the modal
export function closeModal(){
    const modal = document.querySelector(".modal")
    modal.classList.remove("show")
    modal.style.display = "none"
}


export function showModal(){
    const modal = document.querySelector(".modal")
    modal.classList.add("show");
    modal.style.display = "block";


    
}

//funtion to close modal 
