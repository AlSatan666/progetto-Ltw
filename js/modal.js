document.addEventListener('DOMContentLoaded', function () {
    const loginBtn = document.getElementById('loginBtn');
    const loginModal = document.getElementById('loginModal');
    const closeModalButtons = document.querySelectorAll('.close');
    const registerModal = document.getElementById('registerModal');
    const loginLink = document.getElementById('login-link');
    const registerLink = document.getElementById('register-link');



    if (loginBtn) {
        loginBtn.addEventListener('click', function () {
            loginModal.style.display = 'block';
        });
    }

    if (closeModalButtons) {
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                loginModal.style.display = 'none';
                registerModal.style.display = 'none';
            });
        });
    }

    window.addEventListener('click', function (e) {
        if (e.target === loginModal) {
            loginModal.style.display = 'none';
        } else if (e.target === registerModal) {
            registerModal.style.display = 'none';
        }
    });

    if (registerLink) {
        registerLink.addEventListener('click', function (e) {
            e.preventDefault();
            loginModal.style.display = 'none';
            registerModal.style.display = 'block';
        });
    }

    if (loginLink) {
        loginLink.addEventListener('click', function (e) {
            e.preventDefault();
            registerModal.style.display = 'none';
            loginModal.style.display = 'block';
        });
    }
});
