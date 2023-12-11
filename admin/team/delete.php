<?php
include_once __DIR__ . '/team.php';

$teamMemberId = isset($_GET['id']) ? $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteTeamMember($teamMemberId);

    header('Location: index.php');
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
        <title>Delete Team Member</title>
    </head>
    <body>

    <h1>Delete Team Member</h1>

    <p>Are you sure you want to delete <?= $teamMember['name'] ?>?</p>

    <form method="post">
        <button type="submit">Yes, Delete</button>
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
