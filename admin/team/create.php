<?php
include_once __DIR__ . '/team.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'bio' => $_POST['bio'],
    ];

    $lastInsertId = createTeamMember($data);

    header('Location: edit.php?id=' . $lastInsertId);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Team Member</title>
</head>
<body>

<h1>Create Team Member</h1>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="position">Position:</label>
    <input type="text" id="position" name="position" required>

    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio" required></textarea>

    <button type="submit">Save</button>
</form>

<a href="index.php">Back to List</a>

</body>
</html>
