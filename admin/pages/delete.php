<?php
include_once __DIR__ . '/pages.php';

$pageId = isset($_GET['id']) ? $_GET['id'] : 1;
$page = getPage($pageId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deletePage($pageId);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
</head>
<body>

<h1>Delete Page</h1>

<p>Are you sure you want to delete this page?</p>

<form method="post">
    <button type="submit">Yes, Delete</button>
</form>

<a href="detail.php?id=<?= $page['id'] ?>">Cancel</a>
<a href="index.php">Back to List</a>

</body>
</html>
