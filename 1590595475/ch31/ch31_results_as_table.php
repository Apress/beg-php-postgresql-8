<?php
   include "pgsql.class.php";
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   $pgsqldb->connect();
   // Execute the query
   $pgsqldb->query('SELECT name as "Product", price as "Price", description as "Description" FROM product');
   // Return the result as a table
   echo $pgsqldb->getResultAsTable();
?>
