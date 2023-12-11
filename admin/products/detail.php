<?php
include_once __DIR__ . '/products.php';

$productId = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the product data for the given ID
$product = getProduct($productId);

if (!$product) {
    // Handle the case where the product is not found
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
</head>
<body>

<h1>Product Detail</h1>

<h2><?= $product['productName'] ?></h2>
<p><?= $product['applications'] ?></p>

<a href="edit.php?id=<?= $productId ?>">Edit</a>
<a href="delete.php?id=<?= $productId ?>">Delete</a>
<a href="index.php">Back to List</a>

</body>
</html>
