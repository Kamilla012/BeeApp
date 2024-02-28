const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector('.chat-box');

form.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                getChatData();
                // Reload the page after inserting the chat message
                location.reload();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

function getChatData() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                chatBox.innerHTML = xhr.responseText;
                console.log("select")
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

// Get initial chat data when the page loads
window.onload = getChatData;
