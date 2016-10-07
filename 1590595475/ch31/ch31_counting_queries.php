<?php
   include "pgsql.class.php";
   // Create a new pgsql object
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   // Connect to the database server and select a database
   $pgsqldb->connect();
   // Execute a few queries
   $query = "SELECT name, price FROM product ORDER BY name";
   $pgsqldb->query($query);
   $query2 = "SELECT name, price FROM product
              WHERE productcode='tshirt01'";
   $pgsqldb->query($query2);
   // Output the total number of queries executed.
   echo "Total number of queries executed: ".$pgsqldb->numQueries();
?>
