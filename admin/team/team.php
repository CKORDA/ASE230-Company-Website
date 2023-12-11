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

// Function to retrieve and index all team members
function getAllTeamMembers() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM team");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching team members: " . $e->getMessage());
    }
}

// Function to retrieve and show a specific team member
function getTeamMember($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM team WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching team member: " . $e->getMessage());
    }
}

// Function to create a team member
function createTeamMember($data) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO team (name, position, bio) VALUES (:name, :position, :bio)");

    try {
        $stmt->execute([
            ':name' => $data['name'],
            ':position' => $data['position'],
            ':bio' => $data['bio'],
        ]);
    } catch (PDOException $e) {
        die("Error creating team member: " . $e->getMessage());
    }
}

// Function to update a team member
function updateTeamMember($id, $data) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("UPDATE team SET name = :name, position = :position, bio = :bio WHERE id = :id");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':position', $data['position']);
        $stmt->bindParam(':bio', $data['bio']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error updating team member: " . $e->getMessage());
    }
}

// Function to delete a team member
function deleteTeamMember($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("DELETE FROM team WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting team member: " . $e->getMessage());
    }
}
?>
