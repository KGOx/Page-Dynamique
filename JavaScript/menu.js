class MenuHamburger {
    constructor(buttonSelector, menuSelector) {
        this.button = document.querySelector(buttonSelector);
        this.menu = document.querySelector(menuSelector);

        if (this.button && this.menu) {
            this.button.addEventListener("click", () => this.toggleMenu());
        }
    }

    toggleMenu() {
        this.menu.classList.toggle("show");
    }
}

// Initialisation après le chargement de la page
document.addEventListener("DOMContentLoaded", () => {
    new MenuHamburger(".navbar-toggler", "#navbarNav");
});