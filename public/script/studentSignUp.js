const optionsCourses = {
    cea: 
      ["Bachelor of Science in Mechanical Engineering", 
      "Bachelor of Science in Civil Engineering", 
      "Bachelor of Science in Electrical Engineering",
      "Bachelor of Science in Electronics Engineering",
      "Bachelor of Science in Computer Engineering",
      "Bachelor of Science in Industrial Engineering",
      "Bachelor of Science in Instrumentation and Control Engineering",
      "Bachelor of Science in Mechatronics"],
  ics: ["Bachelor of Science in Information Technology"],
  iarch: ["Bachelor of Science in Architecture"],
  cbea: ["Bachelor of Science in Accountancy", 
        "Bachelor of Science in Entrepreneurship",
        "Bachelor of Science in Office Administration",
        "Bachelor of Science in Business Administration Major in Operations Management",
        "Bachelor of Science in Business Administration Major in Marketing Management",
        "Bachelor of Science in Business Administration Major in Financial Management",
        "Bachelor of Science in Business Administration Major in Human Resource Management"],
  ced: ["Bachelor of Secondary Education major in English",
        "Bachelor of Secondary Education major in Math", 
        "Bachelor of  Secondary Education major in Science",
        "Bachelor of Secondary Education major in Social Studies",
        "Bachelor of Secondary Education Major in Filipino",
        "Bachelor of Technical-Vocational Teacher Education major in Animation",
        "Bachelor of Technical-Vocational Teacher Education major in Computer Hardware Servicing",
        "Bachelor of Technical-Vocational Teacher Education major in Visual Graphic Design",
        "Bachelor or Technical-Vocational Teacher Education Major in Garments Fashion and Design",
        "Bachelor or Technical-Vocational Teacher Education Major in Electronics Technology",
        "Bachelor or Technical-Vocational Teacher Education Major in Welding and Fabrications Technology"],
  cas: ["Bachelor of Science in Psychology", 
        "Bachelor of Arts in Political Science", 
        "Bachelor of Science in Statistics",
        "Bachelor of Science in Biology",
        "Bachelor of Science in Astronomy"],
  ihk: ["Bachelor of Science in Physical Education"]
};

function updateCourses() {
    const dept = document.getElementById("department").value;
    const itemsCourses = document.getElementById("courses");
    itemsCourses.innerHTML = '<option value="">Select your course</option>';
    
    if (dept && optionsCourses[dept]) {
        optionsCourses[dept].forEach(item => {
            const option = document.createElement("option");
            option.textContent = item;
            itemsCourses.appendChild(option);
        });
    }
}

var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
    document.addEventListener("click", closeAllSelect);


    /*Password Script*/
var password = document.getElementById('password');
var toggler = document.getElementById('toggler');
showHidePassword = () => {
        if (password.type == 'password') {
            password.setAttribute('type', 'text');
            toggler.classList.add('fa-eye-slash');
        } else {
            toggler.classList.remove('fa-eye-slash');
            password.setAttribute('type', 'password');
        }
};
    toggler.addEventListener('click', showHidePassword);

    /*Confitm Password Script*/
var confirmpassword = document.getElementById('confirmpassword');
var toggler1 = document.getElementById('toggler1');
showHideConfirmPassword = () => {
        if (confirmpassword.type == 'password') {
            confirmpassword.setAttribute('type', 'text');
            toggler1.classList.add('fa-eye-slash');
        } else {
            toggler1.classList.remove('fa-eye-slash');
            confirmpassword.setAttribute('type', 'password');
        }
};

toggler1.addEventListener('click', showHideConfirmPassword);

    