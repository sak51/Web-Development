<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="customer_details_update.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
<?php
    //Establish a connection to the MYSQL database
    $servername = "localhost";
    $uname = "root";
    $upass = "";
    $dbname ="mini_project";

    $conn = new mysqli($servername, $uname, $upass, $dbname);

    //check the connection
    if ($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    $userId = $_POST['userId'];

    $query = "SELECT * FROM `borrowed_books` WHERE userId='$userId'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        while($row = mysqli_fetch_array($query_run)){
?>
<div class="container">
        <h2>Borrow Book</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="useId">Member ID:</label>
                <input type="text" id="userId" name="userId" value="<?php echo $row['userId'] ?>">
            </div>
            <div class="form-group">
                <label for="username">Name:</label>
                <input type="text" value="<?php echo $row['username'] ?>" id="username" name="username" >
            </div>
            <div class="form-group">
                <label for="bookId">Book ID:</label>
                <input type="text" value="<?php echo $row['bookId'] ?>" id="bookId" name="bookId">
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" value="<?php echo $row['title'] ?>" id="title" name="title" >
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" value="<?php echo $row['author'] ?>" id="author" name="author">
            </div>
            <div class="form-group">
                <label for="returndate">Return Date:</label>
                <input type="date" value="<?php echo $row['returnDate'] ?>" id="returnDate" name="returnDate">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
<?php

    if(isset($_POST['update']))
    {
        // $userId = $_POST['userId'];
        $username = $_POST['username']; 
        $bookId = $_POST['bookId'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $returnDate = $_POST['returnDate'];

        $query = "UPDATE `borrowed_books` SET `username`='$username',`bookId`='$bookId',`title`='$title',`author`='$author',`returnDate`='$returnDate' WHERE userId='$userId'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            header("location:student.php");
            //echo '<script> alert("Data Updated"); </script>';
        }
        else{
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
<?php 
    }
}
else{
    echo '<script> alert("No Record Found"); </script>';
}


//mysqli_free_result($query_run);

//mysqli_close($conn);
?>

</body>
</html>