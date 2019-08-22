<?php
//Native code to use PostgreSQL with PHP
    $con = pg_connect("host=localhost dbname=php_react") or die("Could not connect to Server\n);");
   
   
    // $name = json_decode($_POST["name"])
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    $idToDelete = $data->id;

    $result = pg_query($con, "DELETE FROM \"owner\" WHERE id=$idToDelete;");
    if( !$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    echo $name;

    pg_close($con);