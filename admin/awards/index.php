<?php
include_once __DIR__ . '/awards.php';

$allAwards = getAllAwards();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awards List</title>
</head>
<body>

<h1>Awards List</h1>

<ul>
    <?php foreach ($allAwards as $award): ?>
        <li>
            <?= $award['year'] ?>: <?= $award['description'] ?>
            <a href="detail.php?id=<?= $award['id'] ?>">Detail</a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="create.php">Create New Award</a>

</body>
</html>
