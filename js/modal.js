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
        document.getElementById('body')
    });

    closeModal.forEach((button) => {
        button.addEventListener('click', () => {
            loginModal.style.display = 'none';
            registerModal.style.display = 'none';
        })
    }); //chisura per entrambe le modal window

    window.addEventListener('click', (e) =>{
        if (e.target == loginModal) {
            loginModal.style.display = 'none';
        }
        else if (e.target == registerModal) {
            registerModal.style.display = 'none';
        }
    }); //chiusura click zona esterna alla modal

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