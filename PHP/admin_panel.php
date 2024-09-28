<div class="books">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Library Management</title>
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
            <th>BookID</th>
            <th>Title</th>
            <th>Author</th>
        </tr>
        <!-- PHP code to fetch books from the database and display them -->
        <?php
            // Include database connection file
            include 'data.php';
            
            // Fetch books from the database
            $sql = "SELECT * FROM books";
            $result = mysqli_query($conn, $sql);
            
            // Display each book as a row in the table
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['bookId']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['author']."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
</div>
</body>
</html>
