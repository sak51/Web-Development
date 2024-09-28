<?php
// Include database connection
include('data.php');

// Get input data from form
$userId = $_POST['userId'];

// Check if borrow ID exists
$query = "SELECT * FROM borrowed_books WHERE userId = $userId";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Borrow ID exists, so delete the borrowed book record
    $delete_query = "DELETE FROM borrowed_books WHERE userId = $userId";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: student.php");
    } else {
        echo "Error deleting borrowed book: " . mysqli_error($conn);
    }
} else {
    echo "Borrow ID not found.";
}

// Close database connection
mysqli_close($conn);
?>
