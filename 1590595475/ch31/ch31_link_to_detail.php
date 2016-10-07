<?php
   include "pgsql.class.php";
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   $pgsqldb->connect();
   // Query the database
   $pgsqldb->query('SELECT productid, name as "Product",price as "Price" FROM product ORDER BY name');
   $actions='<a href="viewdetail.php?productid=VALUE">View Detailed</a> |<a href="addtocart.php?productid=VALUE">Add To Cart</a>';
   echo $pgsqldb->getResultAsTable($actions);
?>
