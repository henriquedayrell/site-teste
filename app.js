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
    //     document.querySelector('.btn-theme').textContent = "Light theme";
    //     document.querySelector('.btn-theme').classList.remove("btn-dark")
    //     document.querySelector('.btn-theme').classList.add("btn-light")
    } else {
    //     document.querySelector('.btn-theme').textContent = "Dark theme";
        body.classList.add("light-theme")
        body.classList.remove("dark-theme")
        // document.querySelector('.btn-theme').classList.remove("btn-light")
        // document.querySelector('.btn-theme').classList.add("btn-dark")
    }
}

setIniTheme();