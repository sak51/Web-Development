<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <div>
        <a href="admin_panel.php"></a>
</div>
</body>
</html>