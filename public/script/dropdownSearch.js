const dropdown = document.querySelector(".dropdown-select");
const select = dropdown.querySelector(".select");
const arrow = dropdown.querySelector(".arrow");
const menu = dropdown.querySelector(".dropdown-menu");
const options = dropdown.querySelectorAll(".dropdown-menu li");
const selected = dropdown.querySelector(".selected");

select.addEventListener("click", () => {
    select.classList.toggle("select-clicked");
    arrow.classList.toggle("arrow-rotate");
    dropdown-menu.classList.toggle("menu-open")
})

options.forEach(option => {
  option.addEventListener("click", () => {
      selected.innerText = option.innerText;
      select.classList.remove("select-clicked");
      arrow.classList.remove("arrow-rotate");
      menu.classList.remove("menu-open");
      document.querySelector(".select").style.borderColor = "#2043D5";
      options.forEach(option => {
          option.classList.remove("active")
      })
      option.classList.add("active")
  })
})


const dropdown1 = document.querySelector(".dropdown-select1");
const select1 = dropdown1.querySelector(".select1");
const arrow1 = dropdown1.querySelector(".arrow1");
const menu1 = dropdown1.querySelector(".dropdown-menu1");
const options1 = dropdown1.querySelectorAll(".dropdown-menu1 li");
const selected1 = dropdown1.querySelector(".selected1");

select1.addEventListener("click", () => {
    select1.classList.toggle("select-clicked1");
    arrow1.classList.toggle("arrow-rotate1");
    dropdown-menu1.classList.toggle("menu-open1")
})

options1.forEach(option => {
    option.addEventListener("click", () => {
        selected1.innerText = option.innerText;
        select1.classList.remove("select-clicked1");
        arrow1.classList.remove("arrow-rotate1");
        menu1.classList.remove("menu-open1");
        document.querySelector(".select1").style.borderColor = "#2043D5";
        options1.forEach(option => {
            option1.classList.remove("active1")
        })
        option1.classList.add("active1")
    })
})


const dropdown2 = document.querySelector(".dropdown-select2");
const select2 = dropdown2.querySelector(".select2");
const arrow2 = dropdown2.querySelector(".arrow2");
const menu2 = dropdown2.querySelector(".dropdown-menu2");
const options2 = dropdown2.querySelectorAll(".dropdown-menu2 li");
const selected2 = dropdown2.querySelector(".selected2");

select2.addEventListener("click", () => {
    select2.classList.toggle("select-clicked2");
    arrow2.classList.toggle("arrow-rotate2");
    dropdown-menu2.classList.toggle("menu-open2")
})

options2.forEach(option => {
    option.addEventListener("click", () => {
        selected2.innerText = option.innerText;
        select2.classList.remove("select-clicked2");
        arrow2.classList.remove("arrow-rotate2");
        menu2.classList.remove("menu-open2");
        document.querySelector(".select2").style.borderColor = "#2043D5";
        options2.forEach(option => {
            option2.classList.remove("active2")
        })
        option2.classList.add("active2")
    })
})
