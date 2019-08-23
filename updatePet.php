<?php
//Native code to use PostgreSQL with PHP
    $con = pg_connect("host=localhost dbname=php_react") or die("Could not connect to Server\n);");
   
   
    // $name = json_decode($_POST["name"])
    $idToUpdate = $_GET["id"];

    $json = file_get_contents('php://input');

    $data = json_decode($json);

    $pet_name = $data->pet_name;
    $breed = $data->breed;
    $color = $data->color;
    $owner_id = $data->owner;


    $result = pg_query($con, "UPDATE pets SET owner_id='$owner_id', pet_name='$pet_name', breed='$breed' , color='$color' WHERE id=$idToUpdate");
    if( !$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    echo $name;

    pg_close($con);