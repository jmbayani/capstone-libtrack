document.addEventListener("DOMContentLoaded", function () {
    let links = document.querySelectorAll("a");
    links.forEach(link => {
        link.addEventListener("contextmenu", function (event) {
            event.preventDefault(); // Prevent right-click menu
        });
    });
});