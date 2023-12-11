<?php
include_once __DIR__ . '/team.php';

$allTeamMembers = getAllTeamMembers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team List</title>
</head>
<body>

<h1>Team List</h1>

<ul>
    <?php foreach ($allTeamMembers as $member): ?>
        <li>
            <?= $member['name'] ?> - <?= $member['position'] ?>
            <a href="detail.php?id=<?= $member['id'] ?>">Detail</a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="create.php">Add New Team Member</a>

</body>
</html>
