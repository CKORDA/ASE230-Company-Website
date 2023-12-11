<?php
include_once __DIR__ . '/products.php';

$allProducts = getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>

<h1>Product List</h1>

<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Applications</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allProducts as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getProductName() ?></td>
            <td><?= $product->getApplications() ?></td>
            <td>
                <a href="detail.php?id=<?= $product->getId() ?>">Detail</a> |
                <a href="edit.php?id=<?= $product->getId() ?>">Edit</a> |
                <a href="delete.php?id=<?= $product->getId() ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="create.php">Create New Product</a>

</body>
</html>
