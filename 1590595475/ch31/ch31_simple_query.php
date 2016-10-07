<?php
   include "pgsql.class.php";
   /* Create new pgsql object */
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   /* Connect to the database server and select a database */
   $pgsqldb->connect();
   /* Query the database */
   $pgsqldb->query("SELECT name, price FROM product
                    WHERE productcode = 'tshirt01'");
   /* Retrieve the query result as an object */
   $row = $pgsqldb->fetchObject();
   /* Output the data */
   echo "$row->name (\$$row->price)";
?>
