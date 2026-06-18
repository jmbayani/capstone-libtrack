function openSettlementModal() {
    document.getElementById("settlementModal").style.display = "flex";
}

function closeSettlementModal() {
    document.getElementById("settlementModal").style.display = "none";
}

function submitSettlement() {
    let receipt = document.getElementById("receipt").value;

    if (receipt === "") {
        alert("Please enter the Receipt No.");
        return;
    }

    alert("Penalty settlement recorded successfully!\nReceipt No.: " + receipt);
    closeSettlementModal();
}