
<?php
    function connection()
    {
        //Declare the credentials
        $host = "localhost";
        $username = "root";
        $password = "12345";
        $database = "todolistapp";

        //Open a new connection to mysqli server
        $db_connection = new mysqli($host, $username, $password, $database);

        if($db_connection -> connect_error)
        { //if connecting process encountered an error
            echo $db_connection -> connect_error;
        }
        else
        {
            return $db_connection;
        }
    }
?>