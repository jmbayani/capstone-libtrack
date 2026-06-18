const settings_dropdown = document.querySelector(".settings-select");
const settings_select = settings_dropdown.querySelector(".select-settings");
const settings_menu = settings_dropdown.querySelector(".settings-menu");
const settings_options = settings_dropdown.querySelectorAll("a.settings-sidebar-item");
const settings_selected = settings_dropdown.querySelector(".settings-selected");

settings_select.addEventListener("click", () => {
    settings_select.classList.toggle("settings-clicked");
    settings_menu.classList.toggle("settings-menu-open")
})

settings_options.forEach(option => {
    option.addEventListener("click", () => {
        settings_select.classList.remove("select-clicked");
        settings_menu.classList.remove("settings-menu-open");
    })
})