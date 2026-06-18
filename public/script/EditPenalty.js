function openEditPenaltyModal() {
    document.getElementById("editpenaltyModal").style.display = "flex";
}

function closeEditPenaltyModal() {
    document.getElementById("editpenaltyModal").style.display = "none";
}

function submitEditPenalty() {
    let editreason = document.getElementById("editreason").value;
    let editamount = document.getElementById("editamount").value;
    let editremarks = document.getElementById("editremarks").value;

    if (editreason === "" || editamount === "") {
        alert("Please fill out all required fields.");
        return;
    }

    alert("Penalty submitted successfully!\nReason: " + editreason + "\nAmount: " + editamount + "\nRemarks: " + editremarks);
    closeEditPenaltyModal();
}