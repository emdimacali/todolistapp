<?php

    if(!isset($_SESSION)){  //if $_SESSION is not available
        session_start();    //gives access to the $_SESSION variable
    }

    if(!isset($_SESSION['LoggedInEmail'])){
        echo header("Location: login.php"); //redirect to login if there is nothing set in Session of User.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List App</title>
</head>
<body>
    <h1>To Do List App</h1>
    <a href="logout.php">Logout</a>
</body>
</html>