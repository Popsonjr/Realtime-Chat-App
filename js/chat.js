const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendButton = form.querySelector("button"),
chatBox = document.querySelector(".chat-box")

form.onsubmit = (e) => {
    e.preventDefault()
}

sendButton.onclick = () => {
        //ajax 
        let xhr = new XMLHttpRequest() // creating XML object
        xhr.open("POST", "php/insert-chat.php", true)
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = "";
                    scrollToButtom()
                    
                }
            }
        }

    //sending form data through ajax
    let formData = new FormData(form); // creating formData object
    // console.log(formData);
    xhr.send(formData) //formData would be sent to php signup page
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active")
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active")
}

setInterval(() => {
    let xhr = new XMLHttpRequest() // creating XML object
    xhr.open("POST", "php/get-chat.php", true)
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
               let data = xhr.response
               chatBox.innerHTML = data
               if (!chatBox.classList.contains("active")) {
                    scrollToButtom()
               }
            }
        }
    }

    let formData = new FormData(form); // creating formData object
    // console.log(formData);
    xhr.send(formData) //formData would be sent to php signup page
}, 500)

function scrollToButtom() {
    chatBox.scrollTop = chatBox.scrollHeight
}