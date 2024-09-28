<?php
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "mini_project"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useId = $_POST['member_id'];
    $bookId = $_POST['book_id'];

    // Perform necessary validations on member_id and book_id

    // Insert into the database
    $sql = "INSERT INTO borrowed_books (member_id, book_id, borrow_date) VALUES ('$member_id', '$book_id', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Book borrowed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
