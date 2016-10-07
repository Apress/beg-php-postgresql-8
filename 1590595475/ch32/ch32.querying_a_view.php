<?php
   include "pgsql.class.php";
   // Create new pgsql object
   $pgsqldb = new pgsql("localhost","rob","rob","secret");
   // Connect to the database server and select a database
   $pgsqldb->connect();
   // Query the database
   $pgsqldb->query("SELECT name, number FROM directory
                    ORDER BY name");
   // Output the data
   while ($row = $pgsqldb->fetchObject())
      echo "$row->name, $row->number<br />";
?>
