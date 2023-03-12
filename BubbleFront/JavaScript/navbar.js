const toggleNavbar = function () {
    var links = document.querySelector(".nav__ul");
    var login = document.querySelector(".nav__login")
    if (links.classList.contains("hide")) {
        links.classList.remove("hide")
        login.classList.remove("hide")
    } else {
        links.classList.add("hide")
        login.classList.add("hide")
    }
}