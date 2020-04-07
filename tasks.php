<?php

    if(!isset($_SESSION)){  //if $_SESSION is not available
        session_start();    //gives access to the $_SESSION variable
    }

    if(!isset($_SESSION['LoggedInEmail'])){
        echo header("Location: login.php"); //redirect to login if there is nothing set in Session of User.
    }

    include_once("connections/connection.php");
    $db_connection = connection();

    if(isset($_POST['add_task'])){
        $task = $_POST['task'];
        $email = $_SESSION['LoggedInEmail'];

        if(!empty($task)){
            $sql = "INSERT INTO `tasks` (`task_name`,`email`) VALUES ('$task','$email')";
            $db_connection -> query($sql) or die($db_connection -> error);
        }
        else{
            $isEmpty = true;
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
    <script>
        const isEmpty = <?php echo $isEmpty?>;
    </script>
    <h1>To Do List App</h1>
    
    <form action="" method="post">
        <label for="task">Task Title</label>
        <br/>
        <textarea name="task" id="task" cols="30" rows="10" oninput="clearTasksMessageDiv()"></textarea>
        <br/>
        <input type="submit" value="Add Task" name="add_task">
    </form>

    <div id="tasks-message"></div>
    <a href="logout.php">Logout</a>
    <script src="js/tasks.js"></script>
</body>
</html>