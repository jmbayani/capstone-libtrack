const notif_dropdown = document.querySelector(".notif-select");
const notif_select = notif_dropdown.querySelector(".select-notif");
const notif_menu = notif_dropdown.querySelector(".notif-menu");
const notif_options = notif_dropdown.querySelectorAll("a.notif-sidebar-item");
const notif_selected = notif_dropdown.querySelector(".notif-selected");

notif_select.addEventListener("click", (event) => {
    event.stopPropagation(); // Prevent the click from propagating to the document
    notif_select.classList.toggle("notif-clicked");
    notif_menu.classList.toggle("notif-menu-open");
});

notif_options.forEach(option => {   
    option.addEventListener("click", () => {
        notif_select.classList.remove("notif-clicked");
        notif_menu.classList.remove("notif-menu-open");
    });
});

// Close dropdown when clicking outside
document.addEventListener("click", (event) => {
    if (!notif_dropdown.contains(event.target)) {
        notif_select.classList.remove("notif-clicked");
        notif_menu.classList.remove("notif-menu-open");
    }
});

function showSettings(item) {
    item.querySelector(".notif-icon").style.display = "inline-block";
}
function hideSettings(item) {
    item.querySelector(".notif-icon").style.display = "none";
}