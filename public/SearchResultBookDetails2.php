<?php
session_start();
include 'db-connect.php';

if (isset($_GET['accession_number'])) {
    $accession_number = $_GET['accession_number'];

    // Fetch book details from the database
    $sql = "SELECT * FROM book_info WHERE Accession_Number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $accession_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['book_title'] = $row['Book_Title'];
        $_SESSION['book_image'] = base64_encode($row['Book_Image']);
        $_SESSION['author'] = $row['Author'];
        $_SESSION['isbn'] = $row['ISBN'];
        $_SESSION['physical_desc'] = $row['Physical_Description'];
        $_SESSION['genre'] = $row['Genre'];
        $_SESSION['book_status'] = $row['Book_Status'];
        $_SESSION['publisher'] = $row['Publisher'];
        $_SESSION['publication_date'] = $row['Publication_Date'];
        $_SESSION['copyright'] = $row['Copyright'];
        $_SESSION['book_language'] = $row['Book_Language'];
        $_SESSION['book_details'] = $row['Book_Details'];
    } else {
        echo "No book found with the given Accession Number.";
    }
} else {
    echo "No Accession Number provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class='poppins-regular'>
    <div class="maincontainer">
        <div class="book-info">
            <div class="container-cards">
                <div class="card1">
                    <div class="card1-pic">
                        <img src="data:image/jpeg;base64,<?php echo $_SESSION['book_image']; ?>" width="200" height="330">
                    </div>
                    <div class="card1-details">
                        <h1 class="header1"><?php echo $_SESSION['book_title']; ?></h1>
                        <h1 class="header2">by <?php echo $_SESSION['author']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="container-cards1">
                <div class="card3">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd">
                            <div class="details-t">
                                <div class="details-t-bg">
                                    <span class="details-title">Title:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-title-n"><?php echo $_SESSION['book_title']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-a">
                                <div class="details-a-bg">
                                    <span class="details-author">Author:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-author-n"><?php echo $_SESSION['author']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-i">
                                <div class="details-i-bg">
                                    <span class="details-isbn">ISBN:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-isbn-n"><?php echo $_SESSION['isbn']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-p">
                                <div class="details-p-bg">
                                    <span class="details-phydesc">Physical Description:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-phydesc-n"><?php echo $_SESSION['physical_desc']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-m">
                                <div class="details-m-bg">
                                    <span class="details-mat">Material:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-mat-n">Book</span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-k">
                                <div class="details-k-bg">
                                    <span class="details-keyword">Keyword:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-keyword-n"><?php echo $_SESSION['genre']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-s">
                                <div class="details-s-bg">
                                    <span class="details-stat">Status:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-stat-n"><?php echo $_SESSION['book_status']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card4">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd">
                            <div class="details-pub">
                                <div class="details-pub-bg">
                                    <span class="details-publisher">Publisher:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-publisher-n"><?php echo $_SESSION['publisher']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-pubd">
                                <div class="details-pubd-bg">
                                    <span class="details-publisherdate">Publication Date:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-publisherdate-n"><?php echo $_SESSION['publication_date']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-copy">
                                <div class="details-copy-bg">
                                    <span class="details-copyright">Copyright:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-copyright-n">by <?php echo $_SESSION['copyright']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-lang">
                                <div class="details-lang-bg">
                                    <span class="details-language">Language:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-language-n"><?php echo $_SESSION['book_language']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-bs">
                                <div class="details-bs-bg">
                                    <span class="details-booksummary">Book Summary:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-booksummary-n"><?php echo $_SESSION['book_details']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>