document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM wurde geladen!");

    const mobileMenu = document.getElementById("mobile-menu");
    const navList = document.querySelector(".navbar ul");

    mobileMenu.addEventListener("click", function () {
        console.log("Hamburger-Menü wurde geklickt!");
        navList.classList.toggle("active");
        mobileMenu.classList.toggle("open"); /* Fügt die Animation zum Hamburger hinzu */
    });
});

