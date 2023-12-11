<?php
include_once __DIR__ . '/contact.php';

$contactRequests = getAllContactRequests();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Requests</title>
</head>
<body>

<h1>Contact Requests</h1>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contactRequests as $request): ?>
            <tr>
                <td><?= $request['name'] ?></td>
                <td><?= $request['email'] ?></td>
                <td>
                    <a href="detail.php?id=<?= $request['id'] ?>">View Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
