const dropdown = document.querySelector(".dropdown-select");
const select = dropdown.querySelector(".select");
const arrow = dropdown.querySelector(".arrow");
const menu = dropdown.querySelector(".dropdown-menu");
const options = dropdown.querySelectorAll("a.dropdown-sidebar-item");
const selected = dropdown.querySelector(".selected");

select.addEventListener("click", (event) => {
    event.stopPropagation(); 
    select.classList.toggle("select-clicked");
    arrow.classList.toggle("arrow-rotate");
    menu.classList.toggle("menu-open");
});

document.addEventListener("click", (event) => {
    if (!dropdown.contains(event.target)) {
        select.classList.remove("select-clicked");
        arrow.classList.remove("arrow-rotate");
        menu.classList.remove("menu-open");
    }
});

options.forEach(option => {
    option.addEventListener("click", (event) => {
        event.stopPropagation();
        select.classList.remove("select-clicked");
        arrow.classList.remove("arrow-rotate");
        menu.classList.remove("menu-open");

        options.forEach(opt => opt.classList.remove("active"));
        option.classList.add("active");
    });
});