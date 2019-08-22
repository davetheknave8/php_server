<?php
//Native code to use PostgreSQL with PHP
    $con = pg_connect("host=localhost dbname=php_react") or die("Could not connect to Server\n);");
   
    $name = $_POST['name'];

    $result = pg_query($con, "INSERT INTO owner (name) VALUES('$name')");
    if( !$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    echo $name;
    echo 'hellot';

    pg_close($con);