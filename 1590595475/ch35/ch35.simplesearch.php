<p>
Search the employee database:<br />
<form action="simplesearch.php" method="post">
Last Name:<br />
<input type="text" name="lastname" size="20" maxlength="40" value="" /><br />
<input type="submit" value="Search!" />
</form>
</p>
<?php
   /* If the form has been submitted with a supplied last name */
   if (isset($_POST['lastname'])){
      include "pgsql.class.php";
      // Connect to server and select database
      $pgsqldb = new pgsql("localhost","company","rob","secret");
      $pgsqldb->connect();
      /* Set the posted variable to a convenient name */
      $lastname = $_POST['lastname'];
      /* Query the employee table */
      $pgsqldb->query("SELECT firstname, lastname, email FROM employee
 WHERE lastname='$lastname'");
     /* If records are found, output the firstname, lastname,
         and email of each record */
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
