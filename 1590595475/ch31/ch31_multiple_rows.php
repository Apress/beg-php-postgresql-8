<?php
   include "pgsql.class.php";
   /* Create new pgsql object */
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   /* Connect to the database server and select a database */
   $pgsqldb->connect();
   /* Query the database */
   $pgsqldb->query("SELECT name, price FROM product ORDER BY name");
   /* Output the data */
   while ($row = $pgsqldb->fetchObject())
      echo "$row->name (\$$row->price)<br />";
?>
