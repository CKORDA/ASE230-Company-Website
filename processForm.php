<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $comments = $_POST["comments"];

    // Validate form data
    if (empty($name) || empty($email) || empty($subject) || empty($comments)) {
        $errorMsg = "All fields are required";
    } else {
        // Define the file path
        $filePath = "contacted.txt";

        // Open the file in append mode
        $file = fopen($filePath, "a");

        // Write form data to the file
        fwrite($file, "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $comments\n\n");

        // Close the file
        fclose($file);

        // Redirect or perform other actions after form submission
        header("Location: index.php");
        exit;
    }
}
?>
