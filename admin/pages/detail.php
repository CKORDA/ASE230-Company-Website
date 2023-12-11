<?php
include_once __DIR__ . '/pages.php';

$pageManager = new PageManager('localhost', 'companywebsite', 'guest', 'guest');

$pageId = isset($_GET['id']) ? $_GET['id'] : 1;
$page = $pageManager->getPage($pageId);

if ($page !== null) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Detail</title>
    </head>
    <body>

    <h1>Page Detail</h1>

    <p><?= $page['pageName'] ?>: <?= $page['contents'] ?></p>

    <a href="edit.php?id=<?= $page['id'] ?>">Edit</a>
    <a href="delete.php?id=<?= $page['id'] ?>">Delete</a>
    <a href="index.php">Back to List</a>

    </body>
    </html>
    <?php
} else {
    // Handle the case where the page is not found
    echo "Page not found!";
}
?>
