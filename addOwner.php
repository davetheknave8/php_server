<?php
//Native code to use PostgreSQL with PHP
    $con = pg_connect("host=localhost dbname=php_react") or die("Could not connect to Server\n);");
   
   
    // $name = json_decode($_POST["name"])
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    $name = $data->name;

    $result = pg_query($con, "INSERT INTO owner (name) VALUES('$name')");
    if( !$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    echo $name;

    pg_close($con);