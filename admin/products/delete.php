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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete the product with the given ID
    deleteProduct($productId);

    // Redirect to the index page after deletion
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>

<h1>Delete Product</h1>

<p>Are you sure you want to delete the product: <?= $product->getProductName() ?>?</p>

<form method="post">
    <button type="submit">Yes, Delete</button>
</form>

<a href="detail.php?id=<?= $productId ?>">Cancel</a>
<a href="index.php">Back to List</a>

</body>
</html>
