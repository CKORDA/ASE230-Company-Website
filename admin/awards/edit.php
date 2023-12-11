<?php
include_once __DIR__ . '/awards.php';
$awardId = isset($_GET['id']) ? $_GET['id'] : 0;
$award = getAward($awardId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'year' => $_POST['year'],
        'description' => $_POST['description'],
    ];

    updateAward($awardId, $data);

    header('Location: detail.php?id=' . $awardId);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Award</title>
</head>
<body>

<h1>Edit Award</h1>

<form method="post">
    <label for="year">Year:</label>
    <input type="text" id="year" name="year" value="<?= $award['year'] ?>" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?= $award['description'] ?></textarea>

    <button type="submit">Save Changes</button>
</form>

<a href="detail.php?id=<?= $awardId ?>">Back to Detail</a>

</body>
</html>
