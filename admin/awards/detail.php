<?php
include_once __DIR__ . '/awards.php';

$awardId = isset($_GET['id']) ? $_GET['id'] : 1;
$award = getAward($awardId);
if ($award !== null) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Award Detail</title>
    </head>
    <body>

    <h1>Award Detail</h1>

    <p><?= $award['year'] ?>: <?= $award['description'] ?></p>

    <a href="edit.php?id=<?= $award['id'] ?>">Edit</a>
    <a href="delete.php?id=<?= $award['id'] ?>">Delete</a>
    <a href="index.php">Back to List</a>

    </body>
    </html>
    <?php
} else {
    // Handle the case where the award is not found
    echo "Award not found!";
}
?>