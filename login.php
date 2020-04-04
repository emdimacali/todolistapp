<?php
    include_once("connections/connection.php");
    $db_connection = connection();

    if(isset($_POST['login'])){
        //query to find the email password combination in the database.
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sha1Encrpyted = sha1($password);
        $fetched_rows = -1;

        $sql = "SELECT * from `app_users` where email='$email' and password='$sha1Encrpyted'";
        $result = $db_connection -> query($sql) or die($db_connection -> error);
        $fetched_rows = $result -> num_rows;

        if($fetched_rows == 1){
            //start a session.
            echo header("Location: tasks.php");//proceed to tasks.php.
        }
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
     <!-- Passing PHP variables TO be processed in JS -->
    <script>
        const fetchedRows = <?php echo $fetched_rows;?>;
    </script>
    <!-- End of Passing PHP variables TO be processed in JS -->
    <h1>To Do List App</h1>
    <h2>Login</h1>

    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" name="login" id="login" value="Login">
    </form>

    <div id="login-message"></div>
    <script src="js/login.js"></script>
</body>
</html>