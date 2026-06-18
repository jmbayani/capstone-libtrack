<?php
include 'db-connect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$allowed_columns = [
    "Title" => "Book_Title",
    "Author" => "Author",
    "Genre" => "Genre",
    "Subject" => "Subject",
    "Accession_No" => "Accession_No"
];

// Get search parameters from URL
$search_text = isset($_GET['search-text']) ? trim($_GET['search-text']) : "";
$search_type = isset($_GET['search-type']) && isset($allowed_columns[$_GET['search-type']]) ? $allowed_columns[$_GET['search-type']] : "Book_Title";

$limit = 4; // Results per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// If no search text is provided, prevent returning all results
if (!empty($search_text)) {
    $search_param = "%$search_text%";

    // Get total matching results count
    $sqlCount = $conn->prepare("SELECT COUNT(*) as total FROM book_info WHERE $search_type LIKE ?");
    $sqlCount->bind_param("s", $search_param);
    $sqlCount->execute();
    $resultCount = $sqlCount->get_result();
    $rowCount = $resultCount->fetch_assoc();
    $totalResults = $rowCount['total'];

    // Fetch search results
    $sql = $conn->prepare("SELECT * FROM book_info WHERE $search_type LIKE ? LIMIT ? OFFSET ?");
    $sql->bind_param("sii", $search_param, $limit, $offset);
    $sql->execute();
    $query = $sql->get_result();
    $results = $query->fetch_all(MYSQLI_ASSOC);
    $_SESSION['search_text'] = $search_text; 
} else {
    $totalResults = 0;
    $results = []; // No results if search text is empty
}

$start = ($totalResults > 0) ? $offset + 1 : 0;
$end = min($offset + $limit, $totalResults);
?>