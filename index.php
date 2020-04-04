<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['LoggedInEmail']){
        echo header("Location: tasks.php");
    }else{
        echo header("Location: login.php");
    }
?>