<?php
include_once __DIR__ . '/team.php';
$teamMemberId = isset($_GET['id']) ? $_GET['id'] : 0;

$teamMember = getTeamMember($teamMemberId);
if ($teamMember !== null) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Team Member Detail</title>
    </head>
    <body>

    <h1>Team Member Detail</h1>

    <p>Name: <?= $teamMember['name'] ?></p>
    <p>Position: <?= $teamMember['position'] ?></p>
    <p>Bio: <?= $teamMember['bio'] ?></p>

    <a href="edit.php?id=<?= $teamMember['id'] ?>">Edit</a>
    <a href="delete.php?id=<?= $teamMember['id'] ?>">Delete</a>
    <a href="index.php">Back to List</a>

    </body>
    </html>
    <?php
} else {
    // Handle the case where the team member is not found
    echo "Team member not found!";
}
?>
