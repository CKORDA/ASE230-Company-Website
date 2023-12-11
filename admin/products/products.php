<?php

class Product {
    private $id;
    private $productName;
    private $applications;

    public function __construct($id, $productName, $applications) {
        $this->id = $id;
        $this->productName = $productName;
        $this->applications = $applications;
    }

    public function getId() {
        return $this->id;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getApplications() {
        return $this->applications;
    }
}

// Database connection parameters
$host = 'localhost';
$dbname = 'companywebsite';
$username = 'guest';
$password = 'guest';

// Attempt to connect to the database using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to retrieve and index all items
function getAllProducts() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM products");
        $productsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        foreach ($productsData as $productData) {
            $products[] = new Product(
                $productData['id'],
                $productData['productName'],
                $productData['applications']
            );
        }

        return $products;
    } catch (PDOException $e) {
        die("Error fetching products: " . $e->getMessage());
    }
}

// Function to retrieve and show a specific item
function getProduct($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $productData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($productData) {
            return new Product(
                $productData['id'],
                $productData['productName'],
                $productData['applications']
            );
        } else {
            return null;
        }
    } catch (PDOException $e) {
        die("Error fetching product: " . $e->getMessage());
    }
}

// Function to create an item
function createProduct($data) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO products (productName, applications) VALUES (:productName, :applications)");

    try {
        $stmt->execute([
            ':productName' => $data['productName'],
            ':applications' => $data['applications'],
        ]);
    } catch (PDOException $e) {
        die("Error creating product: " . $e->getMessage());
    }
}

// Function to update an item
function updateProduct($id, $data) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("UPDATE products SET productName = :productName, applications = :applications WHERE id = :id");
        $stmt->bindParam(':productName', $data['productName']);
        $stmt->bindParam(':applications', $data['applications']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error updating product: " . $e->getMessage());
    }
}

// Function to delete an item
function deleteProduct($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting product: " . $e->getMessage());
    }
}
?>
