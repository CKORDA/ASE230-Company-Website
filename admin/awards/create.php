<?php
include_once __DIR__ . '/awards.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'year' => $_POST['year'],
        'description' => $_POST['description'],
    ];

    createAward($data);

    header('Location: edit.php?id=' . $pdo->lastInsertId());
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Award</title>
</head>
<body>

<h1>Create Award</h1>

<form method="post">
    <label for="year">Year:</label>
    <input type="text" id="year" name="year" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Save</button>
</form>

<a href="index.php">Back to List</a>

</body>
</html>
