<?php

session_start();

if (!isset($_SESSION['welcome'])) {
    header("Location: login.php");
    exit();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
        <form action="logout.php">
            <input type="submit" value="로그아웃">
        </form>
        
</body>
</html>