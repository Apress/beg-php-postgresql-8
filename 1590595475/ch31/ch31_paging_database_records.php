<?php
   include "pgsql.class.php";
   $pgsqldb = new pgsql("localhost","company","rob","secret");
   $pgsqldb->connect();
   // Set the number of entries per page
   $pagesize = 2;
   // What is our record offset?
   $recordstart = (isset($_GET['recordstart'])) ? $_GET['recordstart'] : 0;
   // Execute the SELECT query, including the LIMIT and OFFSET clauses
   $pgsqldb->query("SELECT productid, name as \"Product\", price as \"Price\" FROM product ORDER BY name LIMIT $pagesize OFFSET $recordstart");
   // Output the result set
   $actions = '<a href="viewdetail.php?productid=VALUE">View Detailed</a> | <a href="addtocart.php?productid=VALUE">Add To Cart</a>';
   echo $pgsqldb->getResultAsTable($actions);
   // Determine whether additional rows are available
   $pgsqldb->query("SELECT count(*) FROM product");
   $row = $pgsqldb->fetchObject();
   $totalrows = $row->count;
   // Create the 'previous' link
   if ($recordstart > 0) {
      $prev = $recordstart - $pagesize;
      $url = $_SERVER['PHP_SELF']."?recordstart=$prev";
      echo "<a href=\"$url\">Previous Page</a> ";
   }
   // Create the 'next' link
   if ($totalrows > ($recordstart + $pagesize) {
      $next = $recordstart + $pagesize;
      $url = $_SERVER['PHP_SELF']."?recordstart=$next";
      echo "<a href=\"$url\">Next Page</a>";
   }

	echo "<p>Pages: ".pageLinks($totalpages, $currentpage, $pagesize, "recordstart")."</p>";

?>
