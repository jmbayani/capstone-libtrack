document.querySelectorAll('.admin-editbook').forEach(button => {
    button.addEventListener('click', () => {
        window.top.location.href = 'ManageBooks-EditCopy.html';
    });
});
