<?php
    /*
    postgresSQL database connection
    developer : jaider
    */
    $host= "localhost"; //127.0.0.1
    $username = "postgres";
    $password = "unicesmag";
    $dbname = "mbeta";
    $port = "5432";
    
    $data_connection = "
          host=$host
          port=$port
          dbname=$dbname
          user=$username
          password=$password
        ";

        $conn = pg_connect($data_connection);
        
        if (! $conn) {
            die("connection failed : "preg_last_error());
        }
            else {
            echo "Connected successfully";
         }

        pg_close($conn);
   ?>
