<?php
include_once __DIR__ . '/awards.php';
$awardId = isset($_GET['id']) ? $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteAward($awardId);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Award</title>
</head>
<body>

<h1>Delete Award</h1>

<p>Are you sure you want to delete this award?</p>

<form method="post">
    <button type="submit">Yes, Delete</button>
</form>

<a href="detail.php?id=<?= $awardId ?>">Cancel</a>
<a href="index.php">Back to List</a>

</body>
</html>
