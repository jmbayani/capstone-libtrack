
function openFileARestrictionModal() {
    document.getElementById("filearestrictionModal").style.display = "flex";
}

function closeFileARestrictionModal() {
    document.getElementById("filearestrictionModal").style.display = "none";
}

function submitFileARestriction() {
    let resdesc = document.getElementById("resdesc").value;
    let rescomment = document.getElementById("rescomment").value;

    if (resdesc === "" || rescomment === "") {
        alert("Please fill out all required fields.");
        return;
    }

    alert("Restriction filed successfully!\nRestriction Description: " + resdesc + "\nComments: " + rescomment);
    closeFileARestrictionModal();
}