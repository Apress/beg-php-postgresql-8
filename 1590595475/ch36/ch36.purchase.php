<?php
   session_start();
   include "pgsql.class.php";
   // Retrieve the participant's primary key using some ficticious
   // class that refers to some sort of user session table,
   // mapping a session ID back to a specific user.
   $participant = new participant();
   $buyerid = $participant->getparticipantkey();
   // Give the POSTed item id a friendly variable name
   $itemid = $_POST['itemid'];
   // Retrieve the item seller and price
   // using some ficticious item class.
   $item = new item();
   $sellerid = $item->getitemowner($itemid);
   $price = $item->getprice($itemid);
   // Instantiate the pgsql class
   $pgsqldb = new pgsql("localhost","company","webuser","secret");
   // Connect to the PostgreSQL database
   $pgsqldb->connect();
   // Start by assuming the transaction operations will all succeed
   $transactionsuccess = TRUE;
   // Start the transaction
   $pgsqldb->begintransaction();
   // Debit the buyer's account
   $query = "UPDATE participant SET cash=cash-$price WHERE participantid=$buyerid";
   $result = $pgsqldb->query($query);
   if (!$result OR $result->affectedrows() != 1)
      $transactionsuccess = FALSE;
// Credit seller's account
$query = "UPDATE participant SET cash=cash+$price WHERE participantid=$sellerid";
$result = $pgsqldb->query($query);
if (!$result OR $result->affectedrows() != 1)
   $transactionsuccess = FALSE;
   // Update the trunk item ownership
   $query = "UPDATE trunk SET participantid=$buyerid WHERE trunkid=$itemid";
   $result = $pgsqldb->query($query);
   if (!$result OR $result->affectedrows() != 1)
      $transactionsuccess = FALSE;
   // If $transactionstatus is True, commit the transaction
   // Otherwise roll back the changes
   if ($transactionsuccess) {
      $pgsqldb->commit();
      echo "The swap took place! Congratulations!";
   } else {
      $pgsqldb->rollback();
      echo "There was a problem with the swap! :-(";
   }
?>
