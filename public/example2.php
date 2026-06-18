<?php
include 'example.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search with Pagination</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .results-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two columns */
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            border: 1px solid black;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 12px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            margin-right: 5px;
        }
        .pagination a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Search Users</h2>
    <form method="GET">
        <input type="text" name="searchText" placeholder="Enter search term" value="<?= htmlspecialchars($searchText) ?>" required>
        <select name="filterType">
            <option value="Book_Title" <?= $filterType === "Book_Title" ? "selected" : "" ?>>Title</option>
            <option value="Author" <?= $filterType === "Author" ? "selected" : "" ?>>Author</option>
            <option value="Genre" <?= $filterType === "Genre" ? "selected" : "" ?>>Genre</option>
        </select>
        <button type="submit">Search</button>
    </form>
    
    <?php if ($totalResults > 0): ?>
        <p>Showing <?= $start ?> to <?= $end ?> out of <?= $totalResults ?> results</p>

        <div class="results-container">
            <?php foreach ($results as $row): ?>
                <div class="result-item">
                    <h3><?= htmlspecialchars($row['Book_Title']) ?></h3>
                    <p><strong>Author:</strong> <?= htmlspecialchars($row['Author']) ?></p>
                    <p><strong>Genre:</strong> <?= htmlspecialchars($row['Genre']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($row['Book_Status']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?searchText=<?= urlencode($searchText) ?>&filterType=<?= urlencode($filterType) ?>&page=<?= $page - 1 ?>">Previous</a>
            <?php endif; ?>

            <?php if ($end < $totalResults): ?>
                <a href="?searchText=<?= urlencode($searchText) ?>&filterType=<?= urlencode($filterType) ?>&page=<?= $page + 1 ?>">Next</a>
            <?php endif; ?>
        </div>

    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
