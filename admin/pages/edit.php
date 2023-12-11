<?php
include_once __DIR__ . '/pages.php';

$pageId = isset($_GET['id']) ? $_GET['id'] : 1;
$page = getPage($pageId);

if ($page !== null) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'pageName' => $_POST['pageName'],
            'contents' => $_POST['contents'],
        ];

        updatePage($pageId, $data);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Page</title>
    </head>
    <body>

    <h1>Edit Page</h1>

    <form method="post">
        <label for="pageName">Title:</label>
        <input type="text" id="pageName" name="pageName" value="<?= $page['pageName'] ?>" required>

        <label for="contents">Content:</label>
        <textarea id="contents" name="contents" required><?= $page['contents'] ?></textarea>

        <button type="submit">Save Changes</button>
    </form>

    <a href="index.php">Back to List</a>
    <a href="detail.php?id=<?= $page['id'] ?>">View Details</a>

    </body>
    </html>
    <?php
} else {
    echo "Page not found!";
}
?>
