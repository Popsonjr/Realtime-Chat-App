const form = document.querySelector(".signup form"),
continueButton = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt")
form.onsubmit = (e) => {
    e.preventDefault()
}

continueButton.onclick = () => {
    //ajax 
    let xhr = new XMLHttpRequest() // creating XML object
    xhr.open("POST", "php/signup.php", true)
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                console.log(data);
                if (data == "success") {
                    location.href = "users.php"
                } else {
                    errorText.textContent = data
                    errorText.style.display = "block"
                    
                    
                    
                }
            }
        }
    }

    //sending form data through ajax
    let formData = new FormData(form); // creating formData object
    // console.log(formData);
    xhr.send(formData) //formData would be sent to php signup page
}