---
---

/* Implements the functionality of the sidebar theme switch. */
document.getElementById("theme-toggle").addEventListener('click', toggleSidebarTheme);

function toggleSidebarTheme() {
    localStorage.setItem('{{ site.SidebarThemeStorageKey }}', getColorPreference() === 'light' ? 'dark' : 'light');
    reflectColorPreference();
}

function getColorPreference() {
    if (localStorage.getItem('{{ site.SidebarThemeStorageKey }}'))
        return localStorage.getItem('{{ site.SidebarThemeStorageKey }}');
    else
        return "{{ site.sidebar_theme }}";
}

function reflectColorPreference() {
    if (getColorPreference() == "dark") {
        document.getElementById("masthead").classList.add("dark");
        document.getElementById("theme-button").setAttribute('data-theme', "dark");
    }
    else {
        document.getElementById("masthead").classList.remove("dark");
        document.getElementById("theme-button").setAttribute('data-theme', "light");
    }
}

reflectColorPreference()
document.getElementById("masthead").classList.remove("hidden");
