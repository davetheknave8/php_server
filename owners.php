<?php
//Native code to use PostgreSQL with PHP
    $con = pg_connect("host=localhost dbname=php_react") or die("Could not connect to Server\n);");
    //Query to get info from person table in database
    $results = pg_query($con, "SELECT \"owner\".\"name\", \"owner\".id, count(pets) FROM \"owner\"
	LEFT JOIN pets ON \"owner\".id = pets.owner_id
	GROUP BY \"owner\".\"name\", \"owner\".id
    ORDER BY \"owner\".id;") or die('Query failed: ' . pg_last_error());

    //Setting results from query to $all_results
    $all_results = pg_fetch_all($results);

    //Looping through $all_results and displaying on DOM
    $myJSON = json_encode($all_results);

    echo $myJSON;

     //Closing the connection
    pg_close($con);