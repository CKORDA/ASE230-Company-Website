<?php
include_once __DIR__ . '/team.php';
$teamMemberId = isset($_GET['id']) ? $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'bio' => $_POST['bio'],
    ];

    updateTeamMember($teamMemberId, $data);

    header('Location: detail.php?id=' . $teamMemberId);
    exit;
}

$teamMember = getTeamMember($teamMemberId);
if ($teamMember !== null) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Team Member</title>
    </head>
    <body>

    <h1>Edit Team Member</h1>

    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $teamMember['name'] ?>" required>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="<?= $teamMember['position'] ?>" required>

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" required><?= $teamMember['bio'] ?></textarea>

        <button type="submit">Save Changes</button>
    </form>

    <a href="detail.php?id=<?= $teamMember['id'] ?>">Cancel</a>
    <a href="index.php">Back to List</a>

    </body>
    </html>
    <?php
} else {
    // Handle the case where the team member is not found
    echo "Team member not found!";
}
?>