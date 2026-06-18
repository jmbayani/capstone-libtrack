function openModal() {
    document.getElementById("renewBookModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("renewBookModal").style.display = "none";
}

function submitForm() {
    alert("Your book renewal request has been submitted successfully!");
    closeModal();
}