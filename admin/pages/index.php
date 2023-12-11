<?php
include_once __DIR__ . '/pages.php';

$pageManager = new PageManager('localhost', 'companywebsite', 'guest', 'guest');
$allPages = $pageManager->getAllPages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page List</title>
</head>
<body>

<h1>Page List</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($allPages as $page): ?>
        <tr>
            <td><?= $page['id'] ?></td>
            <td><?= $page['pageName'] ?></td>
            <td>
                <a href="detail.php?id=<?= $page['id'] ?>">Detail</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="create.php">Create New Page</a>

</body>
</html>
