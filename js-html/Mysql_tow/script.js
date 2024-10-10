// light and dark mode start


var icon = document.getElementById("icon");

if (localStorage.getItem("theme") == null) {

    localStorage.setItem("theme", "light");

}

// create a local sotrage and crate a variable theme and its value light we wiill then change this value 


let localdata = localStorage.getItem("theme");

if (localdata == "light") {
    icon.src = "moon.png";
    document.body.classList.remove("dark-theme");
} else if (localdata == "dark") {
    icon.src = "sun.png";
    document.body.classList.add("dark-theme");

}

icon.onclick = function() {
    document.body.classList.toggle("dark-theme");

    if (document.body.classList.contains("dark-theme")) {
        icon.src = "sun.png";
        localStorage.setItem("theme", "dark");

    } else {
        icon.src = "moon.png";
        localStorage.setItem("theme", "light");

    }
}

// light and dark mode end



if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}


  AOS.init();
