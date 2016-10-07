<?php
   include "pgsql.class.php";
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   $pgsqldb->connect();
   // Determine what kind of sort request has been submitted
   // By default this is set to sort name
   $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'name';
   // Query the database
   $pgsqldb->query("SELECT productid, name as \"Product\", price as \"Price\" FROM product ORDER BY $sort ASC");
   $actions = '<a href="viewdetail.php?productid=VALUE">View Detailed</a> | <a href="addtocart.php?productid=VALUE">Add To Cart</a>';
   echo $pgsqldb->getResultAsTable($actions);
?>
