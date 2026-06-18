

function openEditPenaltyModal() {
    document.getElementById("editpenaltyModal").style.display = "flex";
}

function closeEditPenaltyModal() {
    document.getElementById("editpenaltyModal").style.display = "none";
}

function submitEditPenalty() {
    let editremarks = document.getElementById("editremarks").value;

    if (editremarks === "") {
        alert("Please fill out all required fields.");
        return;
    }

    alert("Cancel Reservation successfully!\nRemarks: " + editremarks);
    closeEditPenaltyModal();
}