// This script handles the menu's visibility state

const navToggle = document.getElementById("nav-toggle");
const siteNavigation = document.getElementById("site-navigation");

const menu = {
    isHidden: false,
    show() {
        siteNavigation.classList.remove("hidden");
        menu.isHidden = false;
    },
    hide() {
        siteNavigation.classList.add("hidden");
        menu.isHidden = true;
    },
    toggleVisibility() {
        menu.isHidden ? menu.show() : menu.hide();
    },

    setMobileVisibility() {
        window.innerWidth >= 768 ? menu.show() : menu.hide();
    }
}

navToggle.addEventListener("click", menu.toggleVisibility);
window.addEventListener("load", menu.setMobileVisibility);
window.addEventListener("resize", menu.setMobileVisibility);
