<p>
Search the online resource database:<br />
<form action="fulltextsearch.php" method="post">
Keywords:<br />
<input type="text" name="keywords" size="20" maxlength="40" value="" /><br />
<input type="submit" value="Search!" />
</form>
</p>
<?php
   /* If the form has been submitted with a supplied keyword */
   if (isset($_POST['keywords'])){
      include "pgsql.class.php";
      /* Connect to server and select database */
      $pgsqldb = new pgsql("localhost","company","rob","secret");
      $pgsqldb->connect();
      /* Set the posted variable to a convenient name */
      $keywords = $_POST['keywords'];
      /* Multiple keywords need to be separated by | rather
          than spaces */
      $searchTerms = str_replace(' ','|',$keywords);
      /* Create the query */
      $pgsqldb->query("SELECT name, url FROM webresource WHERE
 description_fti_idx @@ to_tsquery('default', '$searchTerms')");
      /* Output any retrieved rows or display appropriate message */
      if ($pgsqldb->numrows() > 0){
         while ($row = $pgsqldb->fetchobject()) {
            echo "<a href=\"$row->url\">$row->name</a><br />";
          }
      }
      else {
         echo "No Results found.";
      }
   }
?>
