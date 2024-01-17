function setIniTheme() {
    let theme = localStorage.getItem('theme');

    if (!theme) {
        localStorage.setItem('theme', 'light');
        theme = 'light';
    }

    setTheme(theme);
}

function setThemeButton() {
    if (localStorage.getItem('theme') == 'light') {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }

    setIniTheme();
}

function setTheme(theme) {
    var body = document.querySelector("body")

    if (theme == 'dark') {
        body.classList.add("dark-theme")
        body.classList.remove("light-theme")
        document.querySelector('.btn-theme').textContent = "Light theme";
    } else {
        document.querySelector('.btn-theme').textContent = "Dark theme";
        body.classList.add("light-theme")
        body.classList.remove("dark-theme")
    }
}

setIniTheme();