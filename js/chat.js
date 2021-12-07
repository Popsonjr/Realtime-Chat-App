const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendButton = form.querySelector("button")

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
                    let data = xhr.response
                    console.log(data);
                }
            }
        }

    //sending form data through ajax
    let formData = new FormData(form); // creating formData object
    // console.log(formData);
    xhr.send(formData) //formData would be sent to php signup page
}