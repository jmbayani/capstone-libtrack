const sort_select = document.querySelector(".sort-select");
const select_sort = sort_select.querySelector(".select-sort");
const arrow_sort = sort_select.querySelector(".arrow-sort");
const sort_menu = sort_select.querySelector(".sort-menu");
const sort_options = sort_select.querySelectorAll(".sort-menu li");
const sort_selected = sort_select.querySelector(".sort-selected");

select_sort.addEventListener("click", () => {
    select_sort.classList.toggle("select-sort-clicked");
    arrow_sort.classList.toggle("arrow-sort-rotate");
    sort_menu.classList.toggle("sort-menu-open");
})

sort_options.forEach(option => {
    option.addEventListener("click", () => {
        sort_selected.innerText = option.innerText;
        select_sort.classList.remove("select-sort-clicked");
        arrow_sort.classList.remove("arrow-sort-rotate");
        sort_menu.classList.remove("sort-menu-open");
        sort_options.forEach(option => {
            option.classList.remove("sort-active")
        })
        option.classList.add("sort-active")
    })
})