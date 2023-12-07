<?php
// Assuming you have a MySQL database named 'contacts' with a table 'contact_list'

// Database connection parameters
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "contacts";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve and index all contacts
function getAllContacts() {
    global $conn;
    $sql = "SELECT * FROM contact_list";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to retrieve and show a specific contact
function getContactById($contactId) {
    global $conn;
    $sql = "SELECT * FROM contact_list WHERE id = $contactId";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Function to create a new contact
function createContact($name, $email, $phone) {
    global $conn;
    $sql = "INSERT INTO contact_list (name, email, phone) VALUES ('$name', '$email', '$phone')";
    return $conn->query($sql);
}

// Function to modify an existing contact
function updateContact($contactId, $name, $email, $phone) {
    global $conn;
    $sql = "UPDATE contact_list SET name='$name', email='$email', phone='$phone' WHERE id=$contactId";
    return $conn->query($sql);
}

// Function to delete a contact
function deleteContact($contactId) {
    global $conn;
    $sql = "DELETE FROM contact_list WHERE id = $contactId";
    return $conn->query($sql);
}

// Close the database connection
$conn->close();
?>
