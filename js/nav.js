const body = document.querySelector("body"),
    nav = document.querySelector("nav"),
    darkToggle = document.querySelector(".dark-light"),
    sidebarOpen = document.querySelector(".sidebarOpen"),
    sidebarClose = document.querySelector(".sidebarClose"),
    profileDropdownBtn = document.querySelector(".profile-dropdown-btn"),
    profileDropdownList = document.querySelector(".profile-dropdown-list");

let getMode = localStorage.getItem("mode"); /* serve a mantenere il dark/light theme anche se refresho */
if (getMode && getMode === "dark-mode") {
    body.classList.add("dark");
}

darkToggle.addEventListener("click", () => {
    darkToggle.classList.toggle("active"); /* alterna i bottoni dark/light */
    body.classList.toggle("dark"); /* aggiunge la classe dark al body sul click */
    if (!body.classList.contains("dark")) {
        localStorage.setItem("mode", "light-mode");
    } else {
        localStorage.setItem("mode", "dark-mode");
    }
});

sidebarOpen.addEventListener("click", () => {
    nav.classList.add("active");
});

body.addEventListener("click", (e) => {
    let clicked = e.target;

    if (!clicked.classList.contains("sidebarOpen") && !clicked.classList.contains("menu")) {
        nav.classList.remove("active");
    }
});

const toggleDropdown = () => {
    profileDropdownList.classList.toggle("active");
};

profileDropdownBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    toggleDropdown();
});

window.addEventListener("click", (e) => {
    if (!profileDropdownBtn.contains(e.target)) {
        profileDropdownList.classList.remove("active");
    }
});
