<?php
include_once __DIR__ . '/products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a new product with the submitted data
    $data = [
        'productName' => $_POST['productName'],
        'applications' => $_POST['applications'],
    ];

    createProduct($data);

    // Redirect to the edit page for the newly created product
    header('Location: edit.php?id=' . $pdo->lastInsertId());
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

<form method="post">
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" required>

    <label for="applications">Applications:</label>
    <textarea id="applications" name="applications" required></textarea>

    <button type="submit">Save</button>
</form>

<a href="index.php">Back to List</a>

</body>
</html>
