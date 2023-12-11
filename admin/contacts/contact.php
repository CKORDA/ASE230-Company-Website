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

// Function to retrieve and index all contact requests
function getAllContactRequests() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM contact_requests");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching contact requests: " . $e->getMessage());
    }
}

// Function to retrieve and show a specific contact request
function getContactRequest($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM contact_requests WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching contact request: " . $e->getMessage());
    }
}

// Function to create a contact request
function createContactRequest($data) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO contact_requests (name, email, message) VALUES (:name, :email, :message)");

    try {
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':message' => $data['message'],
        ]);
    } catch (PDOException $e) {
        die("Error creating contact request: " . $e->getMessage());
    }
}

// Function to update a contact request
function updateContactRequest($id, $data) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("UPDATE contact_requests SET name = :name, email = :email, message = :message WHERE id = :id");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':message', $data['message']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error updating contact request: " . $e->getMessage());
    }
}

// Function to delete a contact request
function deleteContactRequest($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("DELETE FROM contact_requests WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting contact request: " . $e->getMessage());
    }
}
?>
