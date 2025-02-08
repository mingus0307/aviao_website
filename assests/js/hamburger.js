document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM wurde geladen!");

    const mobileMenu = document.getElementById("mobile-menu");
    const navList = document.querySelector(".navbar ul");
    const navbar = document.querySelector(".navbar"); // Füge die Navbar hinzu

    mobileMenu.addEventListener("click", function () {
        console.log("Hamburger-Menü wurde geklickt!");
        navList.classList.toggle("active");
        mobileMenu.classList.toggle("open"); 
        navbar.classList.toggle("menu-open"); // Neue Klasse für Farbwechsel hinzufügen
    });
});


