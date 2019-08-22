<?php
//Native code to use PostgreSQL with PHP
    $con = pg_connect("host=localhost dbname=php_react") or die("Could not connect to Server\n);");
   
   
    // $name = json_decode($_POST["name"])
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    $owner = $data->owner;
    $pet_name = $data->pet_name;
    $color = $data->color;
    $breed = $data->breed;


    $result = pg_query($con, "INSERT INTO pets (owner_id, pet_name, breed, color)
    VALUES ('$owner', '$pet_name', '$color', '$breed');");
    if( !$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    echo $name;

    pg_close($con);

    //"INSERT INTO owner (name) VALUES('$name')"