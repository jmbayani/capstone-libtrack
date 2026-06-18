function openModal() {
    document.getElementById("reservedModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("reservedModal").style.display = "none";
}

function submitForm() {
    let readyDate = document.getElementById("readyDate").value;
    let comments = document.getElementById("comments").value;

    if (readyDate === "" || comments.trim() === "") {
        alert("Please fill in all fields before submitting.");
        return;
    }

    alert("Reservation confirmed!\nReady Date: " + readyDate + "\nComments: " + comments);
    closeModal();
}