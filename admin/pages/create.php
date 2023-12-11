<?php
include_once __DIR__ . '/pages.php';

$pageManager = new PageManager('localhost', 'companywebsite', 'guest', 'guest');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'pageName' => $_POST['pageName'],
        'contents' => $_POST['contents'],
    ];

    $pageManager->createPage($data);

    header('Location: edit.php?id=' . $pageManager->getLastInsertId());
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
</head>
<body>

<h1>Create Page</h1>

<form method="post">
    <label for="pageName">Title:</label>
    <input type="text" id="pageName" name="pageName" required>

    <label for="contents">Content:</label>
    <textarea id="contents" name="contents" required></textarea>

    <button type="submit">Save</button>
</form>

<a href="index.php">Back to List</a>

</body>
</html>

