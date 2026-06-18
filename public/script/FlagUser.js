document.getElementById("goStatusPage").addEventListener("click", function () {
    const username = this.dataset.username;

    fetch(`update_status.php?user=${encodeURIComponent(username)}`)
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            location.reload(); // Optional
        })
        .catch(error => {
            console.error("Error updating status:", error);
        });
});