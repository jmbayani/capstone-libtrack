document.getElementById("select-all").addEventListener("change", function() {
    let checkboxes = document.querySelectorAll(".book-check");
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

function deleteRow(icon) {
    let row = icon.parentNode.parentNode;
    row.parentNode.removeChild(row);
}