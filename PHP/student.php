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

    $query = "SELECT * FROM `borrowed_books`";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Students</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <style>
            header {
            background-color: #333333;
        }
        </style>
</head>
<body>
<header class="p-3 bg-rgb(167, 173, 179) text-black">
        <div class="navbar">
            <img src="lib_logo.jpg" alt="mylibrary" style="border-radius:40% ; width: 5%;">
            <div class="navlinks">
                <ul class="nav justify-content-end" style="list-style: none;">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="admin_panel.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student.php">Student</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
</header>

<div class="container">
        <h1>Admin Panel - Library Management</h1>
        <div class="books">

    <h2>Books</h2>
    <!-- Display list of books from the database -->
    <table>
        <tr>
            <th>USERID</th>
            <th>USERNAME</th>
            <th>BOOKID</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>EDIT</th>
            <th>RETURN</th>
    
        </tr>
        <!-- PHP code to fetch books from the database and display them -->

        <tr>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                ?>
                    <td><?php echo $row['userId']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['bookId']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>

                    <form action="edit.php" method="post">
                        <input type="hidden" name="userId" value="<?php echo $row['userId']?>">
                        <td><button href="" class="button1" name="edit">Edit</button></td>
                    </form>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="userId" value="<?php echo $row['userId']?>">
                        <td><button href="#" class="button2" name="delete">DELETE</button></td>
                    </form>
        </tr>
        <?php
            }
            ?>
                        
    </table>
        <!-- <?php
            // Include database connection file
            include 'data.php';
            
            // Fetch books from the database
            $sql = "SELECT * FROM borrowed_books";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['userId']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['bookId']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['author']."</td>";
                echo "<td><a href='return_book.php?userId=".$row['userId']."'>Return</a> </td>";
                echo "<td><a href='edit.php?userId=".$row['userId']."'>Edit</a></td>";
                echo "</tr>";
            }
        ?> -->
    </table>
</div>
</div>    
</body>

