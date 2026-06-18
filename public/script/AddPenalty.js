function openPenaltyModal() {
    document.getElementById("penaltyModal").style.display = "flex";
}

function closePenaltyModal() {
    document.getElementById("penaltyModal").style.display = "none";
}

function submitPenalty() {
    let reason = document.getElementById("reason").value;
    let amount = document.getElementById("amount").value;
    let remarks = document.getElementById("remarks").value;

    if (reason === "" || amount === "") {
        alert("Please fill out all required fields.");
        return;
    }

    alert("Penalty submitted successfully!\nReason: " + reason + "\nAmount: " + amount + "\nRemarks: " + remarks);
    closePenaltyModal();
}