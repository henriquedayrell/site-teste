
const switcher = document.querySelector('.btn');
switcher.addEventListener('click', function(){
    var body = document.querySelector("body")
    var className = body.className;
    console.log("w")
    if(className.includes(  "light-theme")) {
        body.classList.add ("dark-theme") 
        body.classList.remove ("light-theme")
        this.textContent = "Light theme";
    }
    else{
        this.textContent = "Dark theme";
        body.classList.add ("light-theme") 
        body.classList.remove ("dark-theme")
    }
    });

