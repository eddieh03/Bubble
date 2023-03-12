const error = document.querySelector(".login .error")

function validate() {
    const emailRE = /^[A-Za-z0-9]+@[a-zA-z-]+\.com|net|edu$/
    let validEmail = emailRE.test(email.value)

    const passwordRE = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\.\!\?\@\#\$\%\&])(?=.{6,20})/;
    let validPass = passwordRE.test(password.value)

    if (!validEmail && !validPass) {
        error.innerText = "Please provide a valid email and password!";
        error.style.display = "block"
    } else if (!validEmail) {
        error.innerText = "Please provide a valid email!";
        error.style.display = "block"
    } else if (!validPass) {
        error.innerText = "Please provide a password with 6+ chars, including upper, lowercase and special chars!";
        error.style.display = "block"
    } else {
        error.style.display = "none"
        return true;
    }
}

submit.addEventListener("click", validate)