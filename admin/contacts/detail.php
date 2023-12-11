<?php
include_once __DIR__ . '/contact.php';

$contactRequestId = isset($_GET['id']) ? $_GET['id'] : 0;
$contactRequest = getContactRequest($contactRequestId);

if ($contactRequest !== null) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Request Detail</title>
    </head>
    <body>

    <h1>Contact Request Detail</h1>

    <p>Name: <?= $contactRequest['name'] ?></p>
    <p>Email: <?= $contactRequest['email'] ?></p>
    <p>Message: <?= $contactRequest['message'] ?></p>

    <a href="index.php">Back to List</a>

    </body>
    </html>
    <?php
} else {
    echo "Contact request not found!";
}
?>
