<?php
include_once __DIR__ . '/products.php';

$productId = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the product data for the given ID
$product = getProduct($productId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the product with the submitted data
    $data = [
        'productName' => $_POST['productName'],
        'applications' => $_POST['applications'],
    ];

    updateProduct($productId, $data);

    // Redirect to the detail page after updating
    header('Location: detail.php?id=' . $productId);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form method="post">
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" value="<?= $product['productName'] ?>" required>

    <label for="applications">Applications:</label>
    <textarea id="applications" name="applications" required><?= $product['applications'] ?></textarea>

    <button type="submit">Save Changes</button>
</form>

<a href="detail.php?id=<?= $productId ?>">Cancel</a>
<a href="index.php">Back to List</a>

</body>
</html>
