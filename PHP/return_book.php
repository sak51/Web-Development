<!-- <?php
include 'data.php';

// Check if book ID is provided
if(isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Update the status of the book in the database
    $sql = "DELETE FROM `borrowed_books` WHERE userId = '$userId'";
    if(mysqli_query($conn, $sql)) {
        header("Location: student.php");
        exit();
    } else {
        echo "Error returning the book: " . mysqli_error($conn);
    }
} else { -->
//    echo "User ID not provided.";
//}
//?> 
