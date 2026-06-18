function deleteRow(button) {
    let row = button.closest("tr"); 
    if (row) {
        row.remove();
    }
}