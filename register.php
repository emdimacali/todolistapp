<?php
    include_once("connections/connection.php"); //we call our connection to db.
    $db_connection = connection();
    $fetched_rows = 0;

    if(isset($_POST['register'])){ //if register button has been pressed
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `app_users` where email='$email'";
        $result = $db_connection -> query($sql) or die($db_connection -> error);
        $fetched_rows = $result -> num_rows;
        //echo $fetched_rows;
        
        if($fetched_rows < 1){
            $sha1EncryptedPassword = sha1($password);
            $sql = "INSERT INTO `app_users`(`email`, `password`) VALUES ('$email', '$sha1EncryptedPassword')";
            $db_connection -> query($sql) or die($db_connection -> error);
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
    <h2>Register an Account.</h1>
    
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" oninput="checkPasswordStrength(this.value)" required>
        
        <input type="submit" name="register" id="register" disabled>
    </form>
    
    <div id="registration-message"></div>

    <script src="js/registration.js"></script>
</body>
</html>