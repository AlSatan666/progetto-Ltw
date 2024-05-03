const body = document.querySelector("body"),
    nav = document.querySelector("nav"),
    darkToggle = document.querySelector(".dark-light"),
    sidebarOpen = document.querySelector(".sidebarOpen"),
    sidebarClose = document.querySelector(".sidebarClose");

    let getMode = localStorage.getItem("mode"); /* serve a mantenere il dark/light theme anche se refresho*/
    if (getMode && getMode=="dark-mode") {
            body.classList.add("dark");
    }
    

    darkToggle.addEventListener("click", () =>{
        darkToggle.classList.toggle("active"); /* alterna i bottoni dark/light*/
        body.classList.toggle("dark"); /* aggiunge la classe dark al body sul click*/ 
        if (!body.classList.contains("dark")) {
            localStorage.setItem("mode", "light-mode");
        } else {
            localStorage.setItem("mode", "dark-mode")
        }
    })



sidebarOpen.addEventListener("click", () =>{
    nav.classList.add("active");
})

body.addEventListener("click", e =>{
    let clicked = e.target;

    if (!clicked.classList.contains("sidebarOpen") && !clicked.classList.contains("menu")) {
        nav.classList.remove("active");
    }
})


// Gestione apertura e chiusura finestra modale per il login
document.addEventListener('DOMContentLoaded', function () {
    const loginBtn = document.getElementById('loginBtn');
    const loginModal = document.getElementById('loginModal');
    const closeModal = document.querySelectorAll('.close');
    const registerModal = document.getElementById('registerModal');
    const loginLink = document.getElementById('login-link');
    const registerLink = document.getElementById('register-link');

    loginBtn.addEventListener('click', function () {
        loginModal.style.display = 'block';
    });

    closeModal.forEach((button) => {
        button.addEventListener('click', () => {
            loginModal.style.display = 'none';
            registerModal.style.display = 'none';
        })
    }); //chisura per entrambe le modal

    window.addEventListener('click', function (e) {
        if (e.target == loginModal) {
            loginModal.style.display = 'none';
        }
    });

    registerLink.addEventListener("click", function(e) {
        e.preventDefault();
        loginModal.style.display = 'none';
        registerModal.style.display = 'block';
    })

    loginLink.addEventListener("click", function(e) {
        e.preventDefault();
        registerModal.style.display = 'none';
        loginModal.style.display = 'block';
    })
});
