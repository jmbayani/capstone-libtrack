<?php
include 'search_books.php';
include 'login-user.php';
$sesEmail = isset($_SESSION['institutional_email']) ? $_SESSION['institutional_email'] : 'blank@example.com';
$sesUser = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$sesSearch = isset($_SESSION['search_text']) ? $_SESSION['search_text'] : 'blank';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/SearchBookResults.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Search Result Books Found</title>
</head>

<body class='poppins-regular'>
    <div class="modal" id="reservedModal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal()">&times;</button>
            <h2>Reserve Books</h2>
            <form id="reservationForm" onsubmit="return false;">
                <div class="info">
                    <p><strong>Book Title:</strong> <span id="modalBookTitle"></span></p>
                    <p><strong>Author:</strong> <span id="modalAuthor"></span></p>
                    <p><strong>Accession Number:</strong> <span id="modalAccessionNumber"></span></p>
                    <p><strong>ISBN:</strong> <span id="modalISBN"></span></p>
                    <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                    <p><strong>Reserved By:</strong> <span id="modalReservedBy"></span> <?php echo $sesUser; ?></p>
                    <p><strong>Email:</strong> <span id="modalEmail"><?php echo $sesEmail; ?></span></p>
                    <p><strong>Total Copies:</strong> <span id="modalTotalCopies"></span></p>
                    <p><strong>Available Copies:</strong> <span id="modalAvailableCopies"></span></p>
                </div>

                <div class="input-group">
                    <label for="readyDate">Ready Date</label>
                    <input type="date" id="readyDate" name="readyDate" min="<?= date('Y-m-d') ?>" required>
                    <label for="needCopies">Copies</label>
                    <input type="number" id="needCopies" name="needCopies" min="1" max="3" step="1" value="1" required>
                </div>
                <div class="input-group">
                    <label for="comments">Comments</label>
                    <textarea id="comments" name="comments" rows="4" placeholder="Enter your comments."></textarea>
                </div>
                <button type="button" class="submit-btn" onclick="logMessage()">Submit</button>

                <script>
                    function logMessage() {
                        const readyDate = document.getElementById('readyDate').value;
                        const needCopies = document.getElementById('needCopies').value;
                        const comments = document.getElementById('comments').value;
                        const sesEmail = <?php echo json_encode($_SESSION['institutional_email']); ?>;
                        const reservedBy = <?php echo json_encode($_SESSION['username']); ?>;
                        const pickupLocation = document.getElementById('modalSubject').innerText.trim();
                        const accessionNumber = document.getElementById('modalAccessionNumber').innerText.trim();

                        // Create the data object to send
                        const reservationData = {
                            readyDate: readyDate,
                            needCopies: needCopies,
                            comments: comments,
                            sesEmail: sesEmail,
                            reservedBy: reservedBy,
                            pickupLocation: pickupLocation,
                            accessionNumber: accessionNumber,
                            status: "Pending"
                        };

                        // Send the data via AJAX to PHP
                        fetch('reserveBook.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(reservationData) // Send data as JSON
                            })
                            .then(response => response.json()) // Parse the JSON response
                            .then(data => {
                                if (data.success) {
                                    alert('Reservation successful!');
                                    document.getElementById("reservedModal").style.display = "none";
                                } else {
                                    alert('Error occurred: ' + data.message);
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        
                    }
                </script>



            </form>
        </div>
    </div>

    <div class="maincontainer">
        <!--<p class="parg5">Sort by: </p>

                <div class="sort-select">
                    <div class="select-sort">
                        <span class="sort-selected">Type:</span>
                        <div class="arrow-sort"></div>
                    </div>
                    <ul class="sort-menu">
                        <li class="sort-active">Relevance</li>
                        <li>Newest</li>
                        <li>Oldest</li>
                    </ul>
                </div>-->

        <label class="search1" onclick="location.href='HomePage.php'">Library search</label>
        <label class="searchiconlabel">></label>
        <label class="searchlabel">Search Results</label>

        <p class="parg1">Search results for <a class="att1">“<?php echo $search_text; ?>”</a></p>
        <?php if ($totalResults > 0):  ?>
            <p class="parg2">Showing <?php echo $start; ?> to <?php echo $end; ?> out of <?php echo $totalResults; ?> results</p>
            <div class="container-cards">
                <?php foreach ($results as $row): ?>
                    <div class="card1">
                        <div class="card1-pic">
                            <img src="data:image/jpeg;base64,<?= base64_encode($row['Book_Image']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card1-details">
                            <h1 class="header1">
                                <?= $row['Book_Title'] ?>
                            </h1>
                            <h1 class="header2">
                                by <?= $row['Author'] ?>
                            </h1>
                            <label class="detail-label1">Published: <a class="dlabel-published"><?= $row['Publication_Date'] ?></a></label><br>
                            <label class="detail-label1">ISBN: <a class="dlabel-isbn"><?= $row['ISBN'] ?></a></label><br>
                            <label class="detail-label1">Physical Description: <a class="dlabel-physicaldesc"><?= $row['Physical_Description'] ?></a></label><br>
                            <label class="detail-label1">Copyright: <a class="dlabel-copyright"><?= $row['Copyright'] ?></a></label><br>
                            <label class="detail-label1">Material: <a class="dlabel-material"><?= $row['Material'] ?></a></label><br>
                            <label class="detail-label1">Keyword: <a class="dlabel-keyword"><?= $row['Genre'] ?></a></label><br>
                            <label class="detail-label1">Status: <a class="dlabel-status"><?= $row['Book_Status'] ?></a></label><br>
                            <br>
                            <button type="button" class="reserve-btn" onclick="openModal( '<?= $row['Book_Title'] ?>', '<?= $row['Author'] ?>', '<?= $row['Accession_Number'] ?>', '<?= $row['ISBN'] ?>', '<?= $row['Shelf_Location'] ?>')">Reserve this book</button>
                            <button type="button" onclick="window.location.href='SearchResultBookDetails.php?accession_number=<?= $row['Accession_Number']; ?>&search_text=<?= urlencode($sesSearch);?>'" class="seebook-btn">See book</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <a class="att2">No Results Found</a>
                <br>
                <p class="parg2"> It looks like the word <a class="att3">"<?= $search_text ?>"</a> did not match any items.</p>
                <p class="parg3"> Try the following tips to improve your search results:</p>
                <ul class="parg4">
                    <li>Make sure that all words are spelled correctly.</li>
                    <br>
                    <li>Try using synonyms or related terms.</li>
                    <br>
                    <li>Use more general terms or fewer words.</li>
                </ul>
            </div>
        <?php endif; ?>
        <!-- Pagination -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?search-text=<?= urlencode($search_text) ?>&search-type=<?= urlencode($_GET['search-type']) ?>&page=<?= $page - 1 ?>">Previous</a>
            <?php endif; ?>

            <?php if ($end < $totalResults): ?>
                <a href="?search-text=<?= urlencode($search_text) ?>&search-type=<?= urlencode($_GET['search-type']) ?>&page=<?= $page + 1 ?>">Next</a>
            <?php endif; ?>
        </div>
    </div>


</body>
<script src="script/dropdownSearch.js" defer></script>
<script src="script/dropdownSortBy.js" defer></script>
<script src="script/reserveBooks.js" defer></script>

</html>