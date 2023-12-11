<?php

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
function getAllPages() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM pages");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching pages: " . $e->getMessage());
    }
}

// Function to retrieve and show a specific item
function getPage($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM pages WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching page: " . $e->getMessage());
    }
}

// Function to create an item

function createPage($data) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO pages (pageName, contents) VALUES (:pageName, :contents)");

    try {
        $stmt->execute([
            ':pageName' => $data['pageName'],
            ':contents' => $data['contents'],
        ]);
    } catch (PDOException $e) {
        die("Error creating page: " . $e->getMessage());
    }
}


// Function to update an item
function updatePage($id, $data) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("UPDATE pages SET pageName = :pageName, contents = :contents WHERE id = :id");
        $stmt->bindParam(':pageName', $data['pageName']);
        $stmt->bindParam(':contents', $data['contents']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error updating page: " . $e->getMessage());
    }
}

// Function to delete an item
function deletePage($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("DELETE FROM pages WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting page: " . $e->getMessage());
    }
}
