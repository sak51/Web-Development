<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get book ID from form
$userId = $_POST['userId'];
$username = $_POST['username'];
$bookId = $_POST['bookId'];
$title = $_POST['title'];
$author = $_POST['author'];
$returnDate = $_POST['returnDate'];

// // Check if the book exists and is available
// $sql = "SELECT * FROM books WHERE bookId = $bookId AND available = 1";
// $result = $conn->query($sql);


    $returnDate = date("Y-m-d");
    $sql = "INSERT INTO borrowed_books (userId,username,bookId,title,author,returnDate) VALUES ('$userId', '$username','$bookId','$title','$author','$returnDate')";
    if ($conn->query($sql) === TRUE) {
        echo "Book borrowed successfully.";
    } else {
        echo "Error borrowing book: " . $conn->error;
    }

$conn->close();
?>
