<?php

$host = 'localhost';
$dbname = 'companyWebsite';
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
function getAllAwards() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM awards");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching awards: " . $e->getMessage());
    }
}

// Function to retrieve and show a specific item
function getAward($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM awards WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $award = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if $award is not false before accessing its elements
        if ($award !== false) {
            return $award;
        } else {
            return null; // Return null if the item is not found
        }
    } catch (PDOException $e) {
        die("Error fetching award: " . $e->getMessage());
    }
}


// Function to create an item
function createAward($data) {
    global $pdo;

    try {
        // Prepare the SQL statement for insertion
        $stmt = $pdo->prepare("INSERT INTO awards (id, year, description) VALUES (:value1, :value2, :value3)");
        
        // Bind the values
        $stmt->bindParam(':value1', $data['id']);
        $stmt->bindParam(':value2', $data['year']);
        $stmt->bindParam(':value3', $data['description']);
        // Add more bindings for other columns as needed

        // Execute the statement
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error creating award: " . $e->getMessage());
    }
}




// Function to update an item
function updateAward($id, $data) {
    global $pdo;

    try {
        // Prepare the SQL statement for update
        $stmt = $pdo->prepare("UPDATE awards SET year = :value1, description = :value2 WHERE id = :id");
        
        // Bind the values
        $stmt->bindParam(':value1', $data['year']);
        $stmt->bindParam(':value2', $data['description']);
        // Add more bindings for other columns as needed
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error updating award: " . $e->getMessage());
    }
}


// Function to delete an item
// Function to delete an item
function deleteAward($id) {
    global $pdo;

    try {
        // Prepare the SQL statement for deletion
        $stmt = $pdo->prepare("DELETE FROM awards WHERE id = :id");
        
        // Bind the value
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting award: " . $e->getMessage());
    }
}


?>
