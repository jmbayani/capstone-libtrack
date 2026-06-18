function openModal(title, author, accessionNumber, isbn, shelfLocation) {
    document.getElementById("reservedModal").style.display = "flex";

    document.getElementById('modalBookTitle').innerText = title;
    document.getElementById('modalAuthor').innerText = author;
    document.getElementById('modalAccessionNumber').innerText = accessionNumber;
    document.getElementById('modalISBN').innerText = isbn;
    document.getElementById('modalSubject').innerText = shelfLocation;

    // Fetch copies data from backend
    fetch(`getBookCopies.php?accession_number=${encodeURIComponent(accessionNumber)}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('modalTotalCopies').innerText = data.totalCopies;
                document.getElementById('modalAvailableCopies').innerText = data.availableCopies;

                // Update max limit for needCopies input
                const needCopiesInput = document.getElementById('needCopies');
                needCopiesInput.max = data.availableCopies;

                // Optional: Disable if none are available
                if (parseInt(data.availableCopies) === 0) {
                    needCopiesInput.disabled = true;
                    document.querySelector('.submit-btn').disabled = true;
                } else {
                    needCopiesInput.disabled = false;
                    document.querySelector('.submit-btn').disabled = false;
                }

            } else {
                document.getElementById('modalTotalCopies').innerText = 'N/A';
                document.getElementById('modalAvailableCopies').innerText = 'N/A';
            }
        })
        .catch(error => {
            console.error('Error fetching book copies:', error);
            document.getElementById('modalTotalCopies').innerText = 'Error';
            document.getElementById('modalAvailableCopies').innerText = 'Error';
        });
}
function closeModal() {
    document.getElementById("reservedModal").style.display = "none";
}

