<p>
Search the employee database:<br />
<form action="searchextended.php" method="post">
Keyword:<br />
<input type="text" name="keyword" size="20" maxlength="40" value="" /><br />
Field:<br />
<select name="field">
   <option value="">Choose field:</option>
   <option value="lastname">Last Name</option>
   <option value="email">E-mail Address</option>
</select>
<input type="submit" value="Search!" />
</form>
</p>
<?php
   /* If the form has been submitted with a supplied keyword */
   if (isset($_POST['field'])){
      include "pgsql.class.php";
      /* Connect to server and select database */
      $pgsqldb = new pgsql("localhost","company","rob","secret");
      $pgsqldb->connect();
      /* Set the posted variables to a convenient name */
      $keyword = $_POST['keyword'];
      $field = $_POST['field'];
      /* Create the query */
      if ($field == "lastname") {
         $pgsqldb->query("SELECT firstname, lastname, email FROM
 employee WHERE lastname='$keyword'");
      }
      elseif ($field == "email") {
         $pgsqldb->query("SELECT firstname, lastname, email FROM
 employee WHERE email='$keyword'");
      }
      /* If records are found, output the firstname, lastname, and
         email of each record */
      if ($pgsqldb->numrows() > 0){
         while ($row = $pgsqldb->fetchobject()) {
            echo "$row->lastname, $row->firstname, ($row->email)<br />";
          }
      }
      else {
         echo "No Results found.";
      }
   }
?>

